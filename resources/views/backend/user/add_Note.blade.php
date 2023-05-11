@extends('backend.layouts.dashboard')
@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <h1>Ajouter note</h1>
    <form action="{{ route('add1', ['iduser' => $edit->id_user, 'idelement' => $edit->id_element]) }}" method="POST">
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
            <input type="number" class="form-control" id="note" name="note" placeholder="entrer la note" required>
        </div>
        <div class="form-group">
            <label for="session">Session :</label>
            <div >
                <select class="form-control" name="session" required>
                    <option value="" selected>Choisir une session</option>
                    <option value="NORMAL">NORMAL</option>
                    <option value="RAT">RAT</option>
                </select> 
            </div>   
        </div>
        <div class="form-group">
            <label for="semstre">Semestre :</label>
            <div >
                <select class="form-control" name="semestre" required>
                    <option value="" selected>Choisir la semestre</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                </select> 
            </div>
        </div>
        <button  class="btn btn-primary" id="edit">Enregistrer</button>
    </form>
</div>
@endsection     
