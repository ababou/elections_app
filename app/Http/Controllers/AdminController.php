<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\Party;
use App\Models\School;
use App\Models\Commune;

class AdminController extends Controller
{
    public function index(Request $request)
{
    // جلب dropdown data
    $communes = Commune::all();
    $schools = School::all();
    $offices_all = Office::all();
    $parties = Party::all();

    // بناء query مع الفلاتر
    $query = Office::with(['results.party', 'school.commune']);

    if ($request->commune_id) {
        $query->whereHas('school.commune', function($q) use ($request) {
            $q->where('id', $request->commune_id);
        });
    }
    if ($request->school_id) {
        $query->where('school_id', $request->school_id);
    }
    if ($request->office_id) {
        $query->where('id', $request->office_id);
    }

    // Pagination
    $offices = $query->paginate(10)->withQueryString();

    // حساب totals لكل حزب داخل الفلاتر
    $partyTotals = [];
    foreach ($parties as $party) {
        $partyTotals[$party->name] = $offices->sum(function($office) use ($party) {
            return $office->results->where('party_id', $party->id)->sum('votes');
        });
    }
/////


// ترتيب النتائج تنازليًا (من الكبير للصغير)
arsort($partyTotals);

    ///

    // حساب المجموع العام لكل حزب في جميع المكاتب بدون فلاتر
    $globalPartyTotals = [];
    foreach ($parties as $party) {
        $globalPartyTotals[$party->name] = Office::with('results')
            ->get()
            ->sum(fn($office) => $office->results->where('party_id', $party->id)->sum('votes'));
    }

    // ترتيب الأحزاب تنازلياً حسب المجموع العام
    arsort($globalPartyTotals);

    // مجموع الأصوات لكل مدرسة لكل حزب
    $schoolTotals = [];
    foreach ($offices as $office) {
        $schoolName = $office->school->name ?? 'غير محدد';
        if(!isset($schoolTotals[$schoolName])) $schoolTotals[$schoolName] = [];
        foreach ($office->results as $result) {
            $partyName = $result->party->name ?? 'غير محدد';
            $schoolTotals[$schoolName][$partyName] = ($schoolTotals[$schoolName][$partyName] ?? 0) + $result->votes;
        }
    }

    // مجموع الأصوات لكل مكتب لكل حزب
    $officeTotals = [];
    foreach ($offices as $office) {
        $officeTotals[$office->name] = [];
        foreach ($office->results as $result) {
            $partyName = $result->party->name ?? 'غير محدد';
            $officeTotals[$office->name][$partyName] = $result->votes;
        }
    }

////

// ترتيب الأصوات لكل مدرسة من الكبير للصغير
foreach ($schoolTotals as $school => &$totals) {
    arsort($totals);
}
unset($totals); // باش نمنع reference side-effects

// ترتيب الأصوات لكل مكتب من الكبير للصغير
foreach ($officeTotals as $office => &$totals) {
    arsort($totals);
}
unset($totals);


////



    return view('admin.dashboard', compact(
        'offices', 'communes', 'schools', 'offices_all',
        'parties', 'partyTotals', 'schoolTotals', 'officeTotals', 'globalPartyTotals'
    ));
}

    /*
    public function index(Request $request)
    {
        // جلب dropdown data
        $communes = Commune::all();
        $schools = School::all();
        $offices_all = Office::all();
        $parties = Party::all();

        // بناء query مع الفلاتر
        $query = Office::with(['results.party', 'school.commune']);

        if ($request->commune_id) {
            $query->whereHas('school.commune', function($q) use ($request) {
                $q->where('id', $request->commune_id);
            });
        }
        if ($request->school_id) {
            $query->where('school_id', $request->school_id);
        }
        if ($request->office_id) {
            $query->where('id', $request->office_id);
        }

        // Pagination
        $offices = $query->paginate(10)->withQueryString();

        // حساب totals لكل حزب
        $partyTotals = [];
        foreach ($parties as $party) {
            $partyTotals[$party->name] = $offices->sum(function($office) use ($party) {
                return $office->results->where('party_id', $party->id)->sum('votes');
            });
        }

        // مجموع الأصوات لكل مدرسة لكل حزب
        $schoolTotals = [];
        foreach ($offices as $office) {
            $schoolName = $office->school->name ?? 'غير محدد';
            if(!isset($schoolTotals[$schoolName])) $schoolTotals[$schoolName] = [];
            foreach ($office->results as $result) {
                $partyName = $result->party->name ?? 'غير محدد';
                $schoolTotals[$schoolName][$partyName] = ($schoolTotals[$schoolName][$partyName] ?? 0) + $result->votes;
            }
        }

        // مجموع الأصوات لكل مكتب لكل حزب
        $officeTotals = [];
        foreach ($offices as $office) {
            $officeTotals[$office->name] = [];
            foreach ($office->results as $result) {
                $partyName = $result->party->name ?? 'غير محدد';
                $officeTotals[$office->name][$partyName] = $result->votes;
            }
        }

        return view('admin.dashboard', compact(
            'offices', 'communes', 'schools', 'offices_all', 
            'parties', 'partyTotals', 'schoolTotals', 'officeTotals'
        ));
    }

*/


     public function getSchools(Commune $commune)
    {
        return response()->json($commune->schools()->select('id','name')->get());
    }

    public function getOffices(School $school)
    {
        return response()->json($school->offices()->select('id','name')->get());
    }


    public function totalResults()
{
    $parties = \App\Models\Party::all();

    // حساب المجموع العام لكل حزب
    $globalPartyTotals = [];
    foreach ($parties as $party) {
        $globalPartyTotals[$party->name] = \App\Models\Office::with('results')
            ->get()
            ->sum(fn($office) => $office->results->where('party_id', $party->id)->sum('votes'));
    }

    // ترتيب تنازلي
    arsort($globalPartyTotals);

    // حساب مجموع الأصوات الكلي لجميع الأحزاب
    $totalVotes = array_sum($globalPartyTotals);

    // حساب النسب المئوية
    $percentages = [];
    foreach ($globalPartyTotals as $party => $votes) {
        $percentages[$party] = $totalVotes > 0 ? round(($votes / $totalVotes) * 100, 2) : 0;
    }

    return view('admin.dashboard_total', compact('globalPartyTotals', 'percentages', 'totalVotes'));
}

}
