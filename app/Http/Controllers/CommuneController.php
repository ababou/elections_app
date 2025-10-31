<?php 
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function index() {
        $communes = Commune::paginate(20);
        return view('admin.communes.index', compact('communes'));
    }

    public function create() {
        return view('admin.communes.create');
    }

    public function store(Request $request) {
        $request->validate(['name'=>'required|unique:communes,name']);
        Commune::create($request->all());
        return redirect()->route('admin.communes.index')->with('success','Commune created!');
    }

    public function edit(Commune $commune) {
        return view('admin.communes.edit', compact('commune'));
    }

    public function update(Request $request, Commune $commune) {
        $request->validate(['name'=>'required|unique:communes,name,'.$commune->id]);
        $commune->update($request->all());
        return redirect()->route('admin.communes.index')->with('success','Commune updated!');
    }

    public function destroy(Commune $commune) {
        $commune->delete();
        return redirect()->route('admin.communes.index')->with('success','Commune deleted!');
    }
}
