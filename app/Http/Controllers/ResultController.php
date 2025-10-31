<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Party;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
   




public function summary() {
        $offices = Office::with('school','results.party')->get();
        return view('admin.results.summary', compact('offices'));
    }
public function edit(Office $office)
    {
        $parties = Party::all();
        $results = Result::where('office_id', $office->id)
            ->pluck('votes', 'party_id')
            ->toArray();

        return view('results.edit', compact('office', 'parties', 'results'));
    }

    public function update(Request $request, Office $office)
    {
        foreach ($request->votes as $party_id => $votes) {
            \App\Models\Result::updateOrCreate(
                ['office_id' => $office->id, 'party_id' => $party_id],
                ['votes' => $votes]
            );
        }

        return redirect()->route('results.edit', $office->id)
                         ->with('success', '✅ تم حفظ النتائج بنجاح!');
    }

}
