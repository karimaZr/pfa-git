<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;

class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        return view('filieres.index', ['filieres' => $filieres]);
    }

    public function create()
    {
        return view('filieres.create');
    }

    public function store(Request $request)
    {
        Filiere::create($request->all());
        return redirect()->route('filieres.index');
    }

    public function show(Filiere $filiere)
    {
        return view('filieres.show', ['filiere' => $filiere]);
    }

    public function edit(Filiere $filiere)
    {
        return view('filieres.edit', ['filiere' => $filiere]);
    }

    public function update(Request $request, Filiere $filiere)
    {
        $filiere->update($request->all());
        return redirect()->route('filieres.index');
    }

    public function destroy(Filiere $filiere)
    {
        $filiere->delete();
        return redirect()->route('filieres.index');
    }
}
