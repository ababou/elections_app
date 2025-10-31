<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Party;
use App\Models\Office;
use App\Models\Result;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    // 🟢 تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'is_admin' => (int) $user->is_admin,
            ],
        ]);
    }

    // 🟡 الإدمن: جلب جميع النتائج
public function getAllNataeje(Request $request)
{
    $user = $request->user();

    // فقط الإدمن يشوف المجموع العام
    if (!$user->is_admin) {
        return response()->json(['message' => 'غير مصرح لك بمشاهدة هذه الصفحة'], 403);
    }

    // نحسب المجموع العام لكل حزب
$results = \App\Models\Result::join('parties', 'results.party_id', '=', 'parties.id')
    ->selectRaw('results.party_id, parties.name as party_name, SUM(results.votes) as total_votes')
    ->groupBy('results.party_id', 'parties.name')
    ->orderByDesc('total_votes')
    ->get()
    ->map(function ($r) {
        return [
            'party_id' => $r->party_id,
            'party_name' => $r->party_name ?? 'غير معروف',
            'total_votes' => (int) $r->total_votes,
        ];
    });


    return response()->json([
        'nataeje' => $results,
    ]);
}


   public function getAllNataeje2(Request $request)
    {
        $user = $request->user();

        if (!$user->is_admin) {
            return response()->json(['message' => 'غير مصرح لك بالوصول لهذه البيانات'], 403);
        }

        $results = Result::with(['party:id,name', 'office:id,name'])
            ->get()
            ->map(function ($r) {
                return [
                    'office_name' => $r->office->name ?? 'غير معروف',
                    'party_name' => $r->party->name ?? 'غير معروف',
                    'total_votes' => $r->votes,
                ];
            });

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'is_admin' => (int) $user->is_admin,
            ],
            'nataeje' => $results,
        ]);
    }




    // 🔵 المستخدم: جلب نتائج المكتب ديالو فقط
    public function getNataeje(Request $request)
    {
        $user = $request->user();

        if ($user->is_admin) {
            // الإدمن يقدر يشوف الكل
            return $this->getAllNataeje($request);
        }

        $office = $user->office;
        if (!$office) {
            return response()->json(['message' => 'ما عندكش مكتب مرتبط بالحساب ديالك'], 404);
        }

        $results = $office->results()->with('party:id,name')->get()->map(function ($r) {
            return [
                'party_id' => $r->party->id,
                'party_name' => $r->party->name,
                'votes' => $r->votes,
            ];
        });

        return response()->json([
            'office' => [
                'id' => $office->id,
                'name' => $office->name,
            ],
            'nataeje' => $results,
        ]);
    }

    // 🔴 حفظ النتائج
    public function saveNataeje(Request $request)
    {
        $request->validate([
            'office_id' => 'required|exists:offices,id',
            'votes' => 'required|array',
        ]);

        $office = Office::findOrFail($request->office_id);

        foreach ($request->votes as $party_id => $votes) {
            Result::updateOrCreate(
                ['office_id' => $office->id, 'party_id' => $party_id],
                ['votes' => $votes]
            );
        }

        return response()->json(['message' => '✅ تم حفظ النتائج بنجاح']);
    }
}
