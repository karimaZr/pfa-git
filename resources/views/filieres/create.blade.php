@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Ajouter une filière</h1>

                <form action="{{ route('filiere.store') }}" method="post">
                    @csrf
                
                    <div>
                        <label for="Nom">Nom :</label>
                        <input type="text" name="Nom" id="Nom" required>
                    </div>
                
                    <div>
                        <label for="abriviation">Abréviation :</label>
                        <input type="text" name="abriviation" id="abriviation" required>
                    </div>
                
                    <div>
                        <label for="Niveau">Niveau :</label>
                        <input type="text" name="Niveau" id="Niveau" required>
                    </div>
                
                    <button type="submit">Enregistrer</button>
                </form>
                
                <a href="{{ route('filiere.index') }}">Retour à la liste des filières</a>
            </div>
        </div>
    </div>   
@endsection
