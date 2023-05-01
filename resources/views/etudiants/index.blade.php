@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4 ">
                    <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        Liste des étudiants
                        <a href="{{ route('etudiants.create') }}" class="btn btn-primary float-right">Nouvel étudiant</a>
                    </div>
                    <div class="card-body">
                        @if (count($etudiants) === 0)
                            <p class="alert alert-warning">Aucun étudiant enregistré pour le moment.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>CNE</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Email</th>
                                        <th>Filière</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etudiants as $etudiant)
                                    @if ($etudiant != null)
                                    <td>{{ $etudiant->CNE }}</td>
                                    <td>{{ $etudiant->Nom }}</td>
                                    <td>{{ $etudiant->Prenom }}</td>
                                    <td>{{ $etudiant->Email }}</td>
                                    <td>{{ $etudiant->filiere_id }}</td>
                                    <td>
                                            <td>
                                                <a href="{{ route('etudiants.show', $etudiant) }}" class="btn btn-info">Voir</a>
                                                <a href="{{ route('etudiants.edit', $etudiant) }}" class="btn btn-warning">Modifier</a>
                                                <form method="POST" action="{{ route('etudiants.destroy', $etudiant) }}" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')    
