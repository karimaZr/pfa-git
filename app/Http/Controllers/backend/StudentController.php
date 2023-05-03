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
    
    public function element() {
        $element = DB::table('element__modules')
            ->where('user_id', auth()->user()->id)
            ->get();
    
        return view('backend.layouts.app', compact('element'));
    }
    
    public function Allstudent($id)
    {   
        $notes = DB::table('notes')
        ->join('users', 'notes.user_id', '=', 'users.id')
        ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
        ->join('modules', 'element__modules.module_id', '=', 'modules.id')
        ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
        ->select('users.id as id_user','element__modules.id as id_element', 'filieres.abriviation as filiere','users.name as user','users.CNE as CNE', 'notes.note')
        ->where('element__modules.id',$id)
        ->get();

        return view('backend.user.prof',compact('notes'));
    }
    // public  function filiere() {
    //     // Récupérer les filières
    //     $filieres = DB::table('filieres')->get();
    
    //     // Récupérer les modules correspondants à chaque filière
    //     // foreach ($filieres as $filiere) {
    //     //     $filiere->modules = DB::table('modules')
    //     //         ->where('id-filiere', $filiere->id)
    //     //         ->get();
    //     // }
    
    //     return view('backend.layouts.sidebar',compact('filieres'));
    // }
    public function editNote($iduser,$idelement){
        $edit=DB::table('notes')
        ->join('users', 'notes.user_id', '=', 'users.id')
        ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
        ->select('users.id as id_user','users.name as user','element__modules.id as id_element', 'notes.note','users.CNE as CNE')
        ->where('notes.user_id', $iduser)
        ->where('notes.element_id', $idelement)
        ->first();
        return view("backend.user.edit_Note",compact('edit'));
    }
public function updateNote(Request $request, $iduser, $id_element)
{   
   
   
    $update = DB::table('notes')
        ->where('user_id', $iduser)
        ->where('element_id', $id_element)
        ->update(['note' => $request->note]);
    if($update){
        $notification=array(
            'messege'=>'note modifié avec succés',
            'alert-type'=>'success'
        );
        return redirect()->route('note',['id' => $id_element])->with($notification);
       
    }
    else{
        $notification=array(
            'messege'=>'note non modifié,ressayez!',
            'alert-type'=>'error'
        );
        return redirect()->route('note',['id' => $id_element])->with($notification);
    }
    
}
}