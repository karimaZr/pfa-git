@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12">
                <h1>Liste des éléments de module</h1>
                <div class="table-responsive">
                    <a href="{{ route('element_modules.create') }}" class="btn btn-primary mb-3">{{ __('Ajouter E-Module') }}</a>
                    <table id="example2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Code') }}</th>
                                <th>{{ __('Nom') }}</th>
                                <th>{{ __('Coefficient') }}</th>
                                <th>{{ __('Module') }}</th>
                                <th>{{ __('Professeur responsable') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($element_modules as $element_module)
                                <tr>
                                    <td>{{ $element_module->Code }}</td>
                                    <td>{{ $element_module->Nom }}</td>
                                    <td>{{ $element_module->coifficent }}</td>
                                    <td>{{ $element_module->module->Nom }}</td>
                                    <td>{{ $element_module->user ? $element_module->user->name : '-' }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-warning dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </a>
    
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a href="{{ route('element_modules.show', $element_module->id) }}" class="btn btn-primary">{{ __('Voir') }}</a></li>

                                                <li><a href="{{ route('element_modules.edit', $element_module->id) }}" class="btn btn-primary">{{ __('Modifier') }}</a></li>

                                        <li><form action="{{ route('element_modules.destroy', $element_module->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                        </form></li></ul></div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
