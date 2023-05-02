<?php

namespace App\Http\Controllers\backend;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Allstudent()
    {   
        $notes = DB::table('notes')
        ->join('users', 'notes.user_id', '=', 'users.id')
        ->join('modules', 'notes.module_id', '=', 'modules.id')
        ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
        ->select('modules.Nom as module', 'filieres.abriviation as filiere', 'users.name as user', 'notes.note')
        ->get();

        return view('backend.user.prof',compact('notes'));
    }
    public  function filiere() {
        // Récupérer les filières
        $filieres = DB::table('filieres')->get();
    
        // Récupérer les modules correspondants à chaque filière
        // foreach ($filieres as $filiere) {
        //     $filiere->modules = DB::table('modules')
        //         ->where('id-filiere', $filiere->id)
        //         ->get();
        // }
    
        return view('backend.layouts.sidebar',compact('filieres'));
    }
    public function editNote($iduser,$idmodule){
        $edit=DB::table('notes')
        ->join('users', 'notes.user_id', '=', 'users.id')
        ->join('modules', 'notes.module_id', '=', 'modules.id')
        ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
        ->select('modules.Nom as module', 'filieres.abriviation as filiere', 'users.name as user', 'notes.note')
        ->where('notes.user_id', $iduser)
        ->where('notes.module_id', $idmodule)
        ->first();
        return view("backend.user.edit_Note",compact('edit'));
    }


}
