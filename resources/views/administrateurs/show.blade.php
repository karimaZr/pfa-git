@extends('backend.layouts.app')
@section('content')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <h1>Détails de l'administrateur</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>Nom :</th>
                <td>{{ $administrateur->Nom }}</td>
            </tr>
            <tr>
                <th>Prénom :</th>
                <td>{{ $administrateur->Prenom }}</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>{{ $administrateur->Email }}</td>
            </tr>
            <tr>
                <th>Mot de passe :</th>
                <td>{{ $administrateur->Mot_de_passe }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('administrateurs.edit', ['id' => $administrateur->id]) }}" class="btn btn-primary">Modifier</a>
    <form action="{{ route('administrateurs.destroy', ['id' => $administrateur->id]) }}" method="POST" style="display: inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
    </form>
</div>
@endsection      
