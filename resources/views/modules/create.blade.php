@extends('backend.layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <h1>Ajouter un module</h1>
            <form action="{{ route('modules.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="code">Code :</label>
                    <input type="text" name="Code" id="code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom :</label>
                    <input type="text" name="Nom" id="nom" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="filiere_id">Filière :</label>
                    <select name="filiere_id" id="filiere_id" class="form-control" required>
                        @foreach ($filieres as $filiere)
                            <option value="{{ $filiere->id }}">{{ $filiere->Nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="semestre">Semestre :</label>
                    <select name="semestre" id="semestre" class="form-control" required>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
</div>
@endsection
