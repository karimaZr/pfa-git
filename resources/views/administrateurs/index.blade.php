@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Liste des administrateurs</h1>
                <a href="{{ route('administrateurs.create') }}" class="btn btn-success">Ajouter un administrateur</a>
                <table id="example2" class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>Email</th>
                            <th>photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrateurs as $administrateur)
                            <tr>
                                <td>{{ $administrateur->name }}</td>
                                <td>{{ $administrateur->email }}</td>
                                <td><img src='/img/{{ $administrateur->photo }}' width="96"></td>
                                <td>
                                    <div class="dropdown">
                                        <a class="btn btn-danger dropdown-toggle" href="#" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            ouvrir
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <li> <a class="dropdown-item"
                                                href="{{ route('administrateurs.show', ['id' => $administrateur->id]) }}">Afficher</a></li>
                                            <li><a class="dropdown-item"
                                                href="{{ route('administrateurs.edit', ['id' => $administrateur->id]) }}">Modifier</a></li>
                                            <li><form action="{{ route('administrateurs.destroy', ['id' => $administrateur->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
                                            </form></li>
                                        </div>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
