@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Détails du professeur {{ $professeur->name }} </h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nom et Prénom:</th>
                            <td>{{ $professeur->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $professeur->email}}</td>
                        </tr>
                        <tr>
                            <th>Spécialité :</th>
                            <td>{{ $professeur->specialite }}</td>
                        </tr>
                        <tr>
                            <th>Photo :</th>
                            <td><img src='/img/{{ $professeur->photo}}' width="96"></td>
                        </tr>
                        <tr>
                            <th><a href="{{ route('professeurs.index') }}" class="btn btn-secondary">Retour</a></th>
                            <a href="{{ route('professeurs.edit', ['id' => $professeur->id]) }}" class="btn btn-primary">Modifier</a>
                            <td><a href="{{ route('professeurs.destroy', ['id' => $professeur->id]) }}" class="btn btn-danger">Supprimer</a>                            </td>
                        </tr> 
                    </tbody>
                </table>

            </div>
        </div></div>
@endsection
