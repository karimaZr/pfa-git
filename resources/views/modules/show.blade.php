@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="table-responsive">
                    <div class="bg-secondary rounded h-100 p-4">

                    <table class="table table-striped table-hover">
                        <h1>Détails du Module {{ $module->Nom }} </h1>
                        <tbody>
                            <tr>
                                <th>Code</th>
                                <td>{{ $module->Code }}</td>
                            </tr>
                            <tr>
                                <th>Nom</th>
                                <td>{{ $module->Nom }}</td>
                            </tr>
                            <tr>
                                <th>Filière</th>
                                <td>{{ $module->filiere->Nom ?? 'N/A' }}</td>
                            </tr>

                            <tr>
                                <th><a href="{{ route('modules.index') }}" class="btn btn-secondary">Retour</a></th>
                                <td><a href="{{ route('modules.edit',$module->id) }}" class="btn btn-warning">Modifier</a></td>
                                <td><a href="{{ route('modules.destroy',$module->id) }}" class="btn btn-danger">Supprimer</a></td>

                            </tr>       

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
