<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index() {
        $offices = Office::with('school','user')->paginate(20);
        return view('admin.offices.index', compact('offices'));
    }


/*    public function create() {
    $schools = School::all();
    $users = User::where('is_admin', false)->get();
    return view('admin.offices.create', compact('schools', 'users'));
}
*/
public function create()
{
    $communes = \App\Models\Commune::all();
    $users = \App\Models\User::where('is_admin', false)->get();
    return view('admin.offices.create', compact('communes', 'users'));
}

/*
public function edit(Office $office) {
    $schools = School::all();
    $users = User::where('is_admin', false)->get();
    return view('admin.offices.edit', compact('office', 'schools', 'users'));
}
*/

public function edit(Office $office)
{
    $communes = \App\Models\Commune::all();
    $schools = \App\Models\School::where('commune_id', optional($office->school)->commune_id)->get();
    $users = \App\Models\User::where('is_admin', false)->get();

    return view('admin.offices.edit', compact('office', 'communes', 'schools', 'users'));
}


   
    public function store(Request $request) {
        $request->validate([
            'name'=>'required',
            'school_id'=>'required|exists:schools,id',
            'user_id'=>'nullable|exists:users,id',
        ]);
        Office::create($request->all());
        return redirect()->route('admin.offices.index')->with('success','Office created!');
    }

   

    public function update(Request $request, Office $office) {
        $request->validate([
            'name'=>'required',
            'school_id'=>'required|exists:schools,id',
            'user_id'=>'nullable|exists:users,id',
        ]);
        $office->update($request->all());
        return redirect()->route('admin.offices.index')->with('success','Office updated!');
    }

    public function destroy(Office $office) {
        $office->delete();
        return redirect()->route('admin.offices.index')->with('success','Office deleted!');
    }
}
