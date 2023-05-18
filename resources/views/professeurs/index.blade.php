@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-md-12 col-xl-12">
                <h1>Liste des professeurs</h1>

                <a href="{{ route('professeurs.create') }}" class="btn btn-primary mb-3">Ajouter un professeur</a>

                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom et prenom</th>
                            <th>Email</th>
                            <th>specialite</th>
                            <th>photo</th>
                            <th>Afficher_E-module</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($professeurs as $professeur)
                            <tr>
                                <td>{{ $professeur->id }}</td>
                                <td>{{ $professeur->name }}</td>
                                <td>{{ $professeur->email }}</td>
                                <td>{{ $professeur->specialite }}</td>
                                <td><img src='/img/{{ $professeur->photo}}' width="96"></td>
                                <td><button class="btn btn-primary" onclick="window.location.href='{{route('teacher.element-module', $professeur->id)}}'">
                                    <i class="fa fa-book"></i> Mes E-Module
                                </button>
                                
                                </td>

                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-danger dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            ouvrir
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li><a href="{{ route('professeurs.show', $professeur->id) }}">voir</a></li>

                                            <li><a href="{{ route('professeurs.edit', $professeur->id) }}">Modifier</a></li>

                                            <li>
                                                <form action="{{ route('professeurs.destroy', $professeur->id) }}"
                                                    method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</button>
                                                </form>
                                            </li>
                                        </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endsection
