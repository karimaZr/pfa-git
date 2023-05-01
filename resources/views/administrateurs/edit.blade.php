@extends('backend.layouts.app')
@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <h1>Modifier l'administrateur</h1>
    <form action="{{ route('administrateurs.update', ['id' => $administrateur->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $administrateur->nom }}" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $administrateur->prenom }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $administrateur->email }}" required>
        </div>
        <div class="form-group">
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
            <small class="form-text text-muted">Laisser vide si vous ne voulez pas modifier le mot de passe.</small>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection     
