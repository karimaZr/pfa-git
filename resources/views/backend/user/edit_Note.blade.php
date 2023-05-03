@extends('backend.layouts.dashboard')
@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <h1>Modifier note</h1>
    <form action="{{ route('update', ['iduser' => $edit->id_user, 'idelement' => $edit->id_element]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">CNE :</label>
            <input type="text" class="form-control" id="nom" name="cne" value="{{ $edit->CNE }}" >
        </div>
        <div class="form-group">
            <label for="prenom">Nom/prenom:</label>
            <input type="text" class="form-control" id="prenom" name="name" value="{{ $edit->user }}" required>
        </div>
        <div class="form-group">
            <label for="email">note :</label>
            <input type="number" class="form-control" id="note" name="note" value="{{ $edit->note }}" required>
        </div>
        <button  class="btn btn-primary" id="edit">Enregistrer</button>
    </form>
</div>
@endsection     
