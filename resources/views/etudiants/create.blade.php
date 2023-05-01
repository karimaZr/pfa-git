@include('backend.layouts.app')
@include('backend.layouts.sidebar')
@include('backend.layouts.navbar')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 ">
        <div class="col-sm-12 col-xl-12">
        <h1 class="mb-5">Ajouter un nouvel étudiant</h1>
        <form method="post" action="{{ route('etudiants.store') }}">
            @csrf
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <div class="form-group">
                <label for="cne">CNE</label>
                <input type="text" class="form-control" id="cne" name="cne" required>
            </div>
            <div class="form-group">
                <label for="date_de_naissance">Date de naissance</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" required>
            </div>
            <div class="form-group">
                <label for="filiere_id">Filière</label>
                <select class="form-control" id="filiere_id" name="filiere_id">
                    @foreach($filieres as $filiere)
                        <option value="{{ $filiere->id }}">{{ $filiere->Nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    </div>
 @include('backend.layouts.footer')       
