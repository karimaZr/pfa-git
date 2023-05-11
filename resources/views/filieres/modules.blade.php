@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1>Modules de {{ $filiere->Nom }}</h1>
        <table id="example2" class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->Code }}</td>

                        <td>{{ $module->Nom }}</td>
                      
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('filiere.index') }}" class="btn btn-secondary">Retour</a>

@endsection
