@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Détails d'etudiant {{ $etudiant->name }} </h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nom et Prénom:</th>
                            <td>{{ $etudiant->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $etudiant->email}}</td>
                        </tr>
                        <tr>
                            <th>CNE :</th>
                            <td>{{ $etudiant->CNE }}</td>
                        </tr>
                        <tr>
                            <th>date_de_naissance :</th>
                            <td>{{$etudiant->Date_de_naissance}}</td>
                        </tr>
                        <tr>
                            <th>Filiere :</th>
                            <td>{{ $etudiant->filiere->Nom ?? 'N/A' }}</td>
                        </tr>

                        <tr>
                            <th>Photo :</th>
                            <td><img src='/img/{{ $etudiant->photo}}' width="96"></td>
                        </tr>
                        <tr>
                            <th><a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour</a></th>
                            <a href="{{ route('etudiants.edit', ['id' => $etudiant->id]) }}" class="btn btn-primary">Modifier</a>
                            <td><a href="{{ route('etudiants.destroy', ['id' =>$etudiant->id]) }}" id="delete" class="btn btn-danger">Supprimer</a>                            </td>
                        </tr> 
                    </tbody>
                </table>

            </div>
@endsection
