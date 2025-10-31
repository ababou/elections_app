<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Commune;

class PartyController extends Controller
{
    public function index() {
        $schools = School::with('commune')->paginate(20);
        return view('admin.schools.index', compact('schools'));
    }

    public function create() {
        $communes = Commune::all();
        return view('admin.schools.create', compact('communes'));
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'commune_id'=>'required',
        ]);
        School::create($request->all());
        return redirect()->route('admin.schools.index')->with('success','School created.');
    }

    public function edit(School $school) {
        $communes = Commune::all();
        return view('admin.schools.edit', compact('school','communes'));
    }

    public function update(Request $request, School $school) {
        $request->validate([
            'name'=>'required',
            'commune_id'=>'required',
        ]);
        $school->update($request->all());
        return redirect()->route('admin.schools.index')->with('success','School updated.');
    }

    public function destroy(School $school) {
        $school->delete();
        return redirect()->route('admin.schools.index')->with('success','School deleted.');
    }
}
