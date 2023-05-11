@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">

        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">

                <h1>Liste des filières</h1>
                
                <a href="{{ route('filiere.create') }}" class="btn btn-primary float-right">Ajouter une filière</a>

                <table id="example2">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Abréviation</th>
                            <th>Niveau</th>
                            <th>Actions</th>
                            <th>Afficher</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($filieres as $filiere)
                            <tr>
                                <td>{{ $filiere->id }}</td>
                                <td>{{ $filiere->Nom }}</td>
                                <td>{{ $filiere->abriviation }}</td>
                                <td>{{ $filiere->Niveau }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li>
                                                <form method="GET" action="{{ route('filiere.show', $filiere->id) }}">
                                                    <button type="submit" >Voir</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form method="GET" action="{{ route('filiere.edit', $filiere->id) }}">
                                                    <button type="submit" >Modifier</button>
                                                </form>
                                            </li>
                                            <li>
                                                <form action="{{ route('filiere.destroy', $filiere->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" >Supprimer</button>
                                                </form>
                                            </li>
                                        </ul>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </a>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li>
                                                <button class="btn btn-primary" onclick="window.location.href='{{ route('filiere.etudiants', $filiere->id) }}'">
                                                    Etudiants
                                                </button>
                                            </li>
                                            <li>
                                                <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('filiere.modules', $filiere->id) }}'">
                                                    Modules
                                                </button>
                                            </li>
                                        </ul>
                                        
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div></div>   
                    @endsection
