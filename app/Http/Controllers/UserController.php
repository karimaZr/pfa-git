<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Filiere;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexProfesseur()
    {
        $professeurs = User::where('role', 'professeur')->get();
        return view('professeurs.index', ['professeurs' => $professeurs]);
    }

    // Afficher le formulaire de création d'un nouveau professeur
    public function createProfesseur()
    {
        return view('professeurs.create');
    }

    // Enregistrer un nouveau professeur dans la base de données
    public function storeProfesseur(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'specialite' => 'required',
            'photo' => 'required|image|mimes:jpg,png,gif'
        ]);

        $professeur = new User();
        $professeur->name = $request->input('name');
        $professeur->email = $request->input('email');
        $professeur->password = Hash::make($request->input('password'));
        $professeur->specialite = $request->input('specialite');
        $professeur->role = 'professeur';

        // enregistrement de la photo
        $image = $request->file('photo');
        $destinationPath = './image';
        $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profilImage);
        $professeur->photo = $profilImage;

        $professeur->save();
        return redirect()->route('professeurs.index');
    }

    // Afficher les détails d'un professeur spécifique
    public function showProfesseur($id)
    {
        $professeur = User::where('role', 'professeur')->find($id);
        return view('professeurs.show', ['professeur' => $professeur]);
    }

    // Afficher le formulaire de modification d'un professeur spécifique
    public function ediProfesseur($id)
    {
        $professeur = User::where('role', 'professeur')->find($id);
        return view('professeurs.edit', ['professeur' => $professeur]);
    }


    // Mettre à jour les informations d'un professeur spécifique dans la base de données
    public function updateProfesseur(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
        'specialite' => 'required',
        'photo' => 'nullable|image|mimes:jpg,png,gif'
    ]);

    $professeur = User::where('role', 'professeur')->find($id);
    $professeur->name = $request->input('name');
    $professeur->email = $request->input('email');
    if (!empty($request->input('password'))) {
        $professeur->password = Hash::make($request->input('password'));
    }
    $professeur->specialite = $request->input('specialite');

    // mise à jour de la photo
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $destinationPath = './image';
        $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profilImage);
        Storage::delete($destinationPath . '/' . $professeur->photo); // supprimer l'ancienne photo
        $professeur->photo = $profilImage;
    }

    $professeur->save();
    return redirect()->route('professeurs.show', ['id' => $professeur->id]);
}

    // Supprimer un professeur spécifique de la base de données
      // Supprimer un professeur spécifique de la base de données    // Supprimer un professeur spécifique de la base de données
        // Supprimer un professeur spécifique de la base de données
        public function destroyProfesseur($id)
        {
            $professeur = User::where('role', 'professeur')->find($id);
            Storage::delete($professeur->photo);
            $professeur->delete();
            return redirect()->route('professeurs.index');
        }
    
        // Afficher la liste des étudiants inscrits dans une filière spécifique
        public function indexEtudiant()
        {
            $etudiants = User::where('role', 'etudiant')->get();
            return view('etudiants.index', ['etudiants' => $etudiants]);
        }
    
    
        // Afficher le formulaire de création d'un nouvel étudiant
        public function createEtudiant()
        {
            $filieres = Filiere::all();
            return view('etudiants.create', ['filieres' => $filieres]);
        }
    
        // Enregistrer un nouvel étudiant dans la base de données
        public function storeEtudiant(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'filiere_id' => 'required',
                'photo' => 'required|image|mimes:jpg,png,gif'
            ]);
    
            $etudiant = new User();
            $etudiant->name = $request->input('name');
            $etudiant->email = $request->input('email');
            $etudiant->password = Hash::make($request->input('password'));
            $etudiant->role = 'etudiant';
            $etudiant->filiere_id = $request->input('filiere_id');
    
            // enregistrement de la photo
            $image = $request->file('photo');
            $destinationPath = './image';
            $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profilImage);
            $etudiant->photo = $profilImage;
    
            $etudiant->save();
            return redirect()->route('etudiants.index');
        }
    
        // Afficher les détails d'un étudiant spécifique
        public function showEtudiant($id)
        {
            $etudiant = User::where('role', 'etudiant')->find($id);
            return view('etudiants.show', ['etudiant' => $etudiant]);
        }
    
        // Afficher le formulaire de modification d'un étudiant spécifique
        public function editEtudiant($id)
        {
            $etudiant = User::where('role', 'etudiant')->find($id);
            $filieres = Filiere::all();
            return view('etudiants.edit', ['etudiant' => $etudiant, 'filieres' => $filieres]);
        }
    // Mettre à jour les informations d'un étudiant spécifique dans la base de données
    public function updateEtudiant(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'filiere_id' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,gif'
        ]);

        $etudiant = User::find($id);
        $etudiant->name = $request->input('name');
        $etudiant->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $etudiant->password = Hash::make($request->input('password'));
        }
        $etudiant->filiere_id = $request->input('filiere_id');

        if ($request->hasFile('photo')) {
            // supprimer l'ancienne photo
            Storage::delete($etudiant->photo);

            // enregistrement de la nouvelle photo
            $image = $request->file('photo');
            $destinationPath = './image';
            $profilImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profilImage);
            $etudiant->photo = $profilImage;
        }

        $etudiant->save();
        return redirect()->route('etudiants.index');
    }

    // Supprimer un étudiant spécifique de la base de données
    public function destroyEtudiant($id)
    {
        $etudiant = User::where('role', 'etudiant')->find($id);
        Storage::delete($etudiant->photo);
        $etudiant->delete();
        return redirect()->route('etudiants.index');
    }
    public function indexAdministrateur()
    {
        $administrateurs = User::where('role', 'Admin')->get();
        return view('administrateurs.index', ['administrateurs' => $administrateurs]);
    }
    
    // Afficher le formulaire de création d'un nouvel administrateur
    public function createAdministrateur()
    {
        return view('administrateurs.create');
    }
    
    // Enregistrer un nouvel administrateur dans la base de données
    public function storeAdministrateur(Request $request)
    {
        $administrateur = new User();
        $administrateur->name = $request->input('nom');
        $administrateur->email = $request->input('email');
        $administrateur->password = bcrypt($request->input('password'));
        $administrateur->photo = $request->input('photo');
        $administrateur->role = 'administrateur';
        $administrateur->save();
        return redirect()->route('administrateurs.index');
    }
    
    // Afficher les détails d'un administrateur spécifique
    public function showAdministrateur($id)
    {
        $administrateur = User::where('role', 'administrateur')->find($id);
        return view('administrateurs.show', ['administrateur' => $administrateur]);
    }
    
    // Afficher le formulaire de modification d'un administrateur spécifique
    public function editAdministrateur($id)
    {
        $administrateur = User::where('role', 'administrateur')->find($id);
        return view('administrateurs.edit', ['administrateur' => $administrateur]);
    }
    
    // Mettre à jour les informations d'un administrateur spécifique dans la base de données
    public function updateAdministrateur(Request $request, $id)
    {
        $administrateur = User::where('role', 'administrateur')->find($id);
        $administrateur->nom = $request->input('nom');
        $administrateur->email = $request->input('email');
        if(!empty($request->input('password'))) {
            $administrateur->password = bcrypt($request->input('password'));
        }
        $administrateur->photo = $request->input('photo');
        $administrateur->save();
        return redirect()->route('administrateurs.show', ['id' => $administrateur->id]);
    }
    
    // Supprimer un administrateur spécifique de la base de données
    public function destroyAdministrateur($id)
    {
        $administrateur = User::where('role', 'administrateur')->find($id);
        $administrateur->delete();
        return redirect()->route('administrateurs.index');
    }
}    