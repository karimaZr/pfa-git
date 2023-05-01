<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Filiere;
class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::all();

        return view('modules.index', compact('modules'));
    }

    public function create()
    {
        $filieres = Filiere::all();
        return view('modules.create')->with('filieres', $filieres);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Code' => 'required|unique:modules',
            'Nom' => 'required',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        Module::create($validatedData);

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès');
    }

    public function show(Module $module)
    {
        return view('modules.show', compact('module'));
    }

    public function edit(Module $module)
    {
        return view('modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $validatedData = $request->validate([
            'Code' => 'required|unique:modules,Code,'.$module->id,
            'Nom' => 'required',
            'filiere_id' => 'required|exists:filieres,id',
        ]);

        $module->update($validatedData);

        return redirect()->route('modules.index')->with('success', 'Module modifié avec succès');
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return redirect()->route('modules.index')->with('success', 'Module supprimé avec succès');
    }
}
