@extends('backend.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
        <h1>Ajouter un nouveau professeur</h1>

        <form action="{{ route('professeurs.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
                <label for="nom">Nom et Prénom:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label for="specialite">Specialite:</label>
                <input type="text" class="form-control" name="specialite" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection     
