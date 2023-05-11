@extends('backend.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <h1>Détails du {{ $element_module->Nom }} </h1>
                <table>
                    <tr>
                        <th>Code:</th>
                        <td>{{ $element_module->Code }}</td>
                    </tr>
                    <tr>
                        <th>Nom:</th>
                        <td>{{ $element_module->Nom }}</td>
                    </tr>
                    <tr>
                        <th>Coefficient:</th>
                        <td>{{ $element_module->coifficent }}</td>
                    </tr>
                    <tr>
                        <th>Module:</th>
                        <td>{{ $element_module->module->Nom }}</td>
                    </tr>
                    <tr>
                        <th>Professeur:</th>
                        <td>{{ $element_module->user->nom }}</td>
                    </tr>
                </table>
                <tr>
                    <th><a href="{{ route('element_modules.show', $element_module->id) }}" class="btn btn-secondary">Retour</a></th>
                    <td><a href="{{ route('element_modules.edit', $element_module->id) }}" class="btn btn-primary">Modifier</a></td>
                    <td><a href="{{ route('element_modules.destroy', $element_module->id) }}" class="btn btn-danger">Supprimer</a>                            </td>
                </tr> 
            </div>
        </div></div>
            @endsection
