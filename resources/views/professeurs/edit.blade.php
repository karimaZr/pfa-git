@extends('backend.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
        <h1>Modifier un professeur</h1>

        <form action="{{ route('professeurs.update', $professeur->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom et Prénom:</label>
                <input type="text" class="form-control" name="name" value="{{ $professeur->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $professeur->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <label for="specialite">Specialite:</label>
                <input type="text" class="form-control" name="specialite" value="{{ $professeur->specialite }}" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection     
