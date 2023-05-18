@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">

        <div class="card-header">
            <h3> Liste des étudiants</h3>
            <a href="{{ route('etudiants.create') }}" class="btn btn-primary float-right">Nouvel étudiant</a>
        </div>
        <div class="card-body">
            @if (count($etudiants) === 0)
                <p class="alert alert-warning">Aucun étudiant enregistré pour le moment.</p>
            @else
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th>CNE</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Filière</th>
                            <th>photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($etudiants as $etudiant)
                            @if ($etudiant != null)
                                <tr>
                                    <td>{{ $etudiant->CNE }}</td>
                                    <td>{{ $etudiant->name }}</td>
                                    <td>{{ $etudiant->email }}</td>
                                    <td>{{ $etudiant->filiere->Nom ?? 'N/A' }}</td>
                                    <td><img src='/img/{{ $etudiant->photo }}' width="96"></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>

                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('etudiants.show', $etudiant) }}">Voir</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('etudiants.edit', $etudiant) }}">Modifier</a></li>
                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('etudiants.destroy', $etudiant) }}"
                                                        style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item" id="delete"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
