@extends('backend.layouts.app')
@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <h1>Liste des administrateurs</h1>
            <a href="{{ route('administrateurs.create') }}" class="btn btn-success">Ajouter un administrateur</a>

            <table id="example1" class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($administrateurs as $administrateur)
                        <tr>
                            <td>{{ $administrateur->name }}</td>
                            <td>{{ $administrateur->email }}</td>
                            <td>
                                <a href="{{ route('administrateurs.show', ['id' => $administrateur->id]) }}" class="btn btn-primary">Afficher</a>
                                <a href="{{ route('administrateurs.edit', ['id' => $administrateur->id]) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('administrateurs.destroy', ['id' => $administrateur->id]) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


