<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // عرض المستخدمين
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // صفحة إضافة مستخدم جديد
    public function create()
    {
        return view('admin.users.create');
    }

    // حفظ المستخدم الجديد
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('admin.users.index')->with('success', '✅ تمت إضافة المستخدم بنجاح');
    }

    // تعديل مستخدم
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // تحديث المستخدم
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'is_admin' => 'required|boolean',
        ]);

        $data = $request->only(['name', 'email', 'is_admin']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', '✅ تم تحديث المستخدم');
    }

    // حذف المستخدم
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', '🗑️ تم حذف المستخدم');
    }
}
