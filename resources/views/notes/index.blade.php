@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h2>Liste des notes pour {{ $module->nom }}</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Etudiant</th>
                <th scope="col">Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notes as $note)
                <tr>
                    <td>{{ $note->user->name }}</td>
                    <td>{{ $note->note }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
