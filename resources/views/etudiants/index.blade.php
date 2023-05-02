@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4 ">
            <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Liste des étudiants</h3>
                        <a href="{{ route('etudiants.create') }}" class="btn btn-primary float-right">Nouvel étudiant</a>
                    </div>
                    <div class="card-body">
                        @if (count($etudiants) === 0)
                            <p class="alert alert-warning">Aucun étudiant enregistré pour le moment.</p>
                        @else
                            <table id="table_etudiant" class="table">
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
                                        <tr>
                                            <td>{{ $etudiant->CNE }}</td>
                                            <td>{{ $etudiant->name }}</td>
                                            <td>{{ $etudiant->email }}</td>
                                            <td>{{ $etudiant->filiere->Nom ?? 'N/A' }}</td>                                            <td><img src="{{url('/image/'.$etudiant->photo)}}"  width="100" height="100"></td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </a>

                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                        <li><a class="dropdown-item" href="{{ route('etudiants.show', $etudiant) }}">Voir</a></li>
                                                        <li><a class="dropdown-item" href="{{ route('etudiants.edit', $etudiant) }}">Modifier</a></li>
                                                        <li>
                                                            <form method="POST" action="{{ route('etudiants.destroy', $etudiant) }}" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#table_etudiant').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json"
                }, // add a comma here
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_etudiant .col-md-6:eq(0)');
        });
    </script> 
    
@endsection
