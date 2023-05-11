@extends('backend.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
 <div class="row g-4">
    <div class="col-sm-12 col-xl-12">
    <h1>Détails de l'administrateur</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>Nom et Prénom :</th>
                <td>{{ $administrateur->name }}</td>
            </tr>
            <tr>
                <th>Email :</th>
                <td>{{ $administrateur->email }}</td>
            </tr>
            <tr>
                <th>photo:</th>
                <td><img src='/img/{{$administrateur->photo}}' width="96"></td>
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