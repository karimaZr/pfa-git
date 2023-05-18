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
    public function noteEtud($id_S)
    {
        $notes = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', $id_S)
            ->select(
                'modules.Nom as module_name',
                'notes.annee_universitaire as annee',
                'filieres.Nom as filiere', DB::raw('SUM(notes.note * element__modules.coifficent) AS module_note'),
                'notes.session as session'
            )
            ->groupBy('modules.id', 'modules.Nom', 'notes.session', 'filiere', 'annee')
            ->get();
        $moduleCount = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', $id_S)
            ->select(DB::raw('COUNT(DISTINCT modules.id) as count'))
            ->first();


        return view('backend.user.student', compact('notes', 'moduleCount'))
            ->with('id', $id_S);
    }
    public function noteSemestre()
    { // Get the notes and module count for semester 1

        $notesS1 = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', 'S1')
            ->select('modules.Nom as module_name', 'notes.annee_universitaire as annee', 'filieres.Nom as filiere', DB::raw('SUM(notes.note * element__modules.coifficent) AS module_note'), 'notes.session as session')
            ->groupBy('modules.id', 'modules.Nom', 'notes.session', 'filiere', 'annee')
            ->get();
        $moduleCountS1 = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', 'S1')
            ->select(DB::raw('COUNT(DISTINCT modules.id) as count'))
            ->first();

        $user = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
            ->where('users.id', '=', auth()->user()->id)
            ->select('notes.annee_universitaire as annee', 'filieres.abriviation as filiere')
            ->get();

        // Get the notes and module count for semester 2
        $notesS2 = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->join('filieres', 'modules.filiere_id', '=', 'filieres.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', 'S2')
            ->select('modules.Nom as module_name', 'notes.annee_universitaire as annee', 'filieres.Nom as filiere', DB::raw('SUM(notes.note * element__modules.coifficent) AS module_note'), 'notes.session as session')
            ->groupBy('modules.id', 'modules.Nom', 'notes.session', 'filiere', 'annee')
            ->get();
        $moduleCountS2 = DB::table('notes')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->join('element__modules', 'notes.element_id', '=', 'element__modules.id')
            ->join('modules', 'element__modules.module_id', '=', 'modules.id')
            ->where('users.id', '=', auth()->user()->id)
            ->where('modules.semestre', '=', 'S2')
            ->select(DB::raw('COUNT(DISTINCT modules.id) as count'))
            ->first();


        return view('backend.user.noteSemestre', compact('notesS1', 'notesS2', 'moduleCountS1', 'moduleCountS2', 'user'))
        ;


    }


    public function Allstudent($id)
    {

        $notes = DB::table('users')
            ->join('filieres', 'users.filiere_id', '=', 'filieres.id')
            ->join('modules', 'filieres.id', '=', 'modules.filiere_id')
            ->join('element__modules', 'modules.id', '=', 'element__modules.module_id')
            ->leftJoin('notes', function ($join) use ($id) {
                $join->on('notes.user_id', '=', 'users.id')
                    ->where('notes.element_id', '=', $id);
            })
            ->where('element__modules.id', '=', $id)
            ->select(

                'users.id as id_user',
                'element__modules.id as id_element',
                'filieres.abriviation as filiere'
                ,'notes.session as session',
                'notes.note as note',
                'users.name as user',
                'users.CNE as CNE'
               
                ,'modules.semestre as semestre',
                
            )
            ->distinct()
            ->get();


        return view('backend.user.prof', compact('notes','id'));
    }
    public function export($id)
    {
        $notes = DB::table('users')
            ->join('filieres', 'users.filiere_id', '=', 'filieres.id')
            ->join('modules', 'filieres.id', '=', 'modules.filiere_id')
            ->join('element__modules', 'modules.id', '=', 'element__modules.module_id')
            ->leftJoin('notes', function ($join) use ($id) {
                $join->on('notes.user_id', '=', 'users.id')
                    ->where('notes.element_id', '=', $id);
            })
            ->where('element__modules.id', '=', $id)
            ->select(
                'users.id as id_user',
                'element__modules.id as id_element',
                'filieres.abriviation as filiere'
                ,
                'users.name as user',
                'users.CNE as CNE',
                'notes.note',
                'notes.session as session',
            )->get();

        $note = DB::table('users')
            ->join('filieres', 'users.filiere_id', '=', 'filieres.id')
            ->join('modules', 'filieres.id', '=', 'modules.filiere_id')
            ->join('element__modules', 'modules.id', '=', 'element__modules.module_id')
            ->leftJoin('notes', function ($join) use ($id) {
                $join->on('notes.user_id', '=', 'users.id')
                    ->where('notes.element_id', '=', $id);
            })
            ->where('element__modules.id', '=', $id)
            ->select(
                
                DB::raw('CONCAT(filieres.abriviation, filieres.Niveau) as filiere'),
                'element__modules.nom as element'
            )->first();

        return view('backend.user.export', compact('notes', 'note'))->with('id', $id);
    }

    
    public function addNote(Request $request, $idelement)
           
{ 
    $notes = $request->input('notes', []);
    $userIds = $request->input('userIds', []);
    $sessions = $request->input('sessions', []);
    $data = [];

    foreach ($userIds as $index => $userId) {
        $note = $notes[$index];
        $session = $sessions[$index];

        $data[] = [
            'element_id' => $idelement,
            'user_id' => $userId,
            'note' => $note,
            'session' => $session,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    foreach ($data as $row) {
        $insert=DB::table('notes')
            ->where('element_id', $row['element_id'])
            ->where('user_id', $row['user_id'])
            ->updateOrInsert($row);
    }

    if ($insert) {
        $notification = array(
            'messege' => 'notes ajoutés avec succés',
            'alert-type' => 'success'
        );
        return redirect()->route('note', ['id' => $idelement])->with($notification);

    } else {
        $notification = array(
            'messege' => 'notes non ajoutés, ressayez!',
            'alert-type' => 'error'
        );
        return redirect()->route('note', ['id' => $idelement])->with($notification);
    }


    }
   
    public function updateNote(Request $request, $idelement)

{ 
    $notes = $request->input('notes', []);
    $userIds = $request->input('userIds', []);
    $sessions = $request->input('sessions', []);
    
    foreach ($userIds as $index => $userId) {
        $note = $notes[$index];
        $session = $sessions[$index];

        $update=DB::table('notes')
            ->where('element_id', $idelement)
            ->where('user_id', $userId)
            ->update([
                'note' => $note,
                'session' => $session,
                'updated_at' => now(),
            ]);
    }
  
       
        if ($update) {
            $notification = array(
                'messege' => 'notes mis à jour avec succés',
                'alert-type' => 'success'
            );
            return redirect()->route('note', ['id' => $idelement])->with($notification);
    
        } else {
            $notification = array(
                'messege' => 'notes non mis à jour, ressayez!',
                'alert-type' => 'error'
            );
            return redirect()->route('note', ['id' => $idelement])->with($notification);
        }
    }
}    