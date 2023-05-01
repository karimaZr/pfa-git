<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Filiere;
use Illuminate\Support\Facades\Storage;

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
        $professeur = new User();
        $professeur->name = $request->input('name');
        $professeur->email = $request->input('email');
        $professeur->password = bcrypt($request->input('password'));
        $professeur->specialite = $request->input('specialite');
        $professeur->photo = $request->input('photo');
        $professeur->role = 'professeur';
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
        $professeur = User::where('role', 'professeur')->find($id);
        $professeur->nom = $request->input('name');
        $professeur->email = $request->input('email');
        if(!empty($request->input('password'))) {
            $professeur->password = bcrypt($request->input('password'));
        }
        $professeur->photo= $request->input('photo');

        $professeur->save();
        return redirect()->route('professeurs.show', ['professeur' => $professeur->id]);
    }

    // Supprimer un professeur spécifique de la base de données
    public function destroyProfesseur($id)
    {
        $professeur = User::where('role', 'professeur')->find($id);
        $professeur->delete();
        return redirect()->route('professeurs.index');
    }
    public function indexEtudiant()
    {
        $etudiants = User::where('role', 'etudiant')->get();
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    // Afficher le formulaire de création d'un nouveau étudiant
    public function createEtudiant()
    {
        $filieres = Filiere::all();
        return view('etudiants.create')->with('filieres', $filieres);
    }

    // Enregistrer un nouveau étudiant dans la base de données
    public function storeEtudiant(Request $request)
    {
        $etudiant = new User();
        $etudiant->name = $request->input('name');
        $etudiant->email = $request->input('email');
        $etudiant->password = bcrypt($request->input('password'));
        $etudiant->role = 'etudiant';
        $etudiant->CNE = $request->input('CNE');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->filiere_id = $request->input('filiere_id');
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->store('uploads/etudiants');
            $etudiant->photo = $filename;
        }
        
        $etudiant->save();
        return redirect()->route('etudiants.index');
    }
    
    public function updateEtudiant(Request $request, $id)
    {
        $etudiant = User::where('role', 'etudiant')->find($id);
        $etudiant->name = $request->input('name');
        $etudiant->email = $request->input('email');
        if (!empty($request->input('password'))) {
            $etudiant->password = bcrypt($request->input('password'));
        }
        $etudiant->CNE = $request->input('CNE');
        $etudiant->date_de_naissance = $request->input('date_de_naissance');
        $etudiant->filiere_id = $request->input('filiere_id');
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->store('uploads/etudiants');
            Storage::delete($etudiant->photo); // supprime l'ancien fichier
            $etudiant->photo = $filename;
        }
        
        $etudiant->save();
        return redirect()->route('etudiants.show', ['etudiant' => $etudiant->id]);
    }
    public function showEtudiant($id)
    {
        $etudiant = User::where('role', 'etudiant')->find($id);
        return view('etudiants.show', ['etudiant' => $etudiant]);
    }
    
    // Supprimer un étudiant spécifique de la base de données
    public function destroyEtudiant($id)
    {
        $etudiant = User::where('role', 'etudiant')->find($id);
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
        $administrateur->nom = $request->input('nom');
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
        $administrateur = User::where('role', 'Admin')->find($id);
        return view('administrateurs.show', ['administrateur' => $administrateur]);
    }

    // Afficher le formulaire de modification d'un administrateur spécifique
    public function editAdministrateur($id)
    {
        $administrateur = User::where('role', 'Admin')->find($id);
        return view('administrateurs.edit', ['administrateur' => $administrateur]);
    }

    // Mettre à jour les informations d'un administrateur spécifique dans la base de données
    public function updateAdministrateur(Request $request, $id)
    {
        $administrateur = User::where('role', 'Admin')->find($id);
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
        $administrateur = User::where('role', 'Admin')->find($id);
        $administrateur->delete();
        return redirect()->route('administrateurs.index');
    }
}
