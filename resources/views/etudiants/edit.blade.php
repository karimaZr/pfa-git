
@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
        <h1>Modifier l'étudiant {{ $etudiant->nom }} {{ $etudiant->prenom }}</h1>
        <form action="{{ route('etudiants.update', ['etudiant' => $etudiant->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $etudiant->email }}">
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
            </div>
            <div class="form-group">
                <label for="cne">CNE :</label>
                <input type="text" class="form-control" id="cne" name="cne" value="{{ $etudiant->cne }}">
            </div>
            <div class="form-group">
                <label for="date_de_naissance">Date de naissance :</label>
                <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance" value="{{ $etudiant->date_de_naissance }}">
            </div>
            <div class="form-group">
                <label for="filiere_id">Filière :</label>
                <select class="form-control" id="filiere_id" name="filiere_id">
                    @foreach ($filieres as $filiere)
                        <option value="{{ $filiere->id }}" {{ $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>{{ $filiere->nom }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    @include('layouts.footer')       
