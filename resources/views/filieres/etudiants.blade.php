@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1>Étudiants de {{ $filiere->Nom }}</h1>
        <table id="example2" class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Photo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($etudiants as $etudiant)
                    <tr>
                        <td>{{ $etudiant->name }}</td>
                        <td>{{ $etudiant->email }}</td>
                        <td><img src="{{ asset('img/' . $etudiant->photo) }}" alt="{{ $etudiant->name }}" width="50"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('filiere.index') }}" class="btn btn-secondary">Retour</a>
@endsection
