@extends('backend.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4 ">
        <div class="col-sm-12 col-xl-12">
        <h1 class="mb-5">Ajouter un nouvel étudiant</h1>
        <form method="post" action="{{ route('etudiants.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="CNE">CNE</label>
                <input type="text" class="form-control" id="CNE" name="CNE" required>
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
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    </div>
    @endsection
