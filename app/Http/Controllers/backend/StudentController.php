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
        ->select('users.id as id_user','modules.id as id_module','modules.Nom as module', 'filieres.abriviation as filiere', 'users.name as user','users.CNE as CNE', 'notes.note')
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
        ->select('users.id as id_user','modules.id as id_module','users.name as user', 'users.name as user', 'notes.note','users.CNE as CNE')
        ->where('notes.user_id', $iduser)
        ->where('notes.module_id', $idmodule)
        ->first();
        return view("backend.user.edit_Note",compact('edit'));
    }
    public function updateNote(Request $request, $iduser, $idmodule)
{   
   
   
    $update = DB::table('notes')
        ->where('user_id', $iduser)
        ->where('module_id', $idmodule)
        ->update(['note' => $request->note]);
    if($update){
        $notification=array(
            'messege'=>'note modifié avec succés',
            'alert-type'=>'success'
        );
        return redirect()->route('student')->with($notification);
       
    }
    else{
        $notification=array(
            'messege'=>'note non modifié,ressayez!',
            'alert-type'=>'error'
        );
        return redirect()->route('student')->with($notification);
    }
    
}


}
