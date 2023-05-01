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


}
