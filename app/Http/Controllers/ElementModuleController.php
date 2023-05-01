<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Element_Module;
use App\Models\Module;
Use App\Models\User;

class ElementModuleController extends Controller
{
    public function create()
{
    $modules = Module::all();
    $professeurs = User::where('role', 'professeur')->get();

    return view('element_modules.create', compact('modules', 'professeurs'));
}

public function store(Request $request)
{
    $request->validate([
        'Code' => 'required|unique:element__modules',
        'Nom' => 'required',
        'coifficent' => 'required',
        'module_id' => 'required',
        'user_id' => 'required'
    ]);

    Element_Module::create($request->all());

    return redirect()->route('element_modules.index')
  
    ->with('success', 'Element de module créé avec succès.');
}
public function index()
{
    $element_modules = Element_Module::all();

    return view('element_modules.index', compact('element_modules'));
}

public function show(Element_Module $element_module)
{
    return view('element_modules.show', compact('element_module'));
}
public function edit(Element_Module $element_module)
{
    $modules = Module::all();
    $professeurs = User::where('role', 'professeur')->get();

    return view('element_modules.edit', compact('element_module', 'modules', 'professeurs'));
}

public function update(Request $request, Element_Module $element_module)
{
    $request->validate([
        'Code' => 'required|unique:element__modules,Code,' . $element_module->id,
        'Nom' => 'required',
        'coifficent' => 'required',
        'module_id' => 'required',
        'user_id' => 'required'
    ]);

    $element_module->update($request->all());

    return redirect()->route('element_modules.index')
        ->with('success', 'Element de module modifié avec succès.');
}
public function destroy(Element_Module $element_module)
{
    $element_module->delete();

    return redirect()->route('element_modules.index')
        ->with('success', 'Element de module supprimé avec succès.');
}


}
