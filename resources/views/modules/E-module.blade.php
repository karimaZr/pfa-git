@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12">
                <h1>Liste des éléments de module</h1>
                <div class="table-responsive">
                    <a href="{{ route('modules.index') }}" class="btn btn-primary mb-3">{{ __('Retour') }}</a>

                    <table id="example2" class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Code') }}</th>
                                <th>{{ __('Nom') }}</th>
                                <th>{{ __('Coefficient') }}</th>
                                <th>{{ __('Professeur responsable') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($element_modules))
                                     @foreach ($element_modules as $element_module)
                                    <tr>
                                        <td>{{ $element_module->Code }}</td>
                                        <td>{{ $element_module->Nom }}</td>
                                        <td>{{ $element_module->coifficent }}</td>
                                        <td>{{ $element_module->user ? $element_module->user->name : '-' }}</td>
                                       
                                    </tr></tbody></table>    
                                @endforeach
                                @endif
                  
                </div>
            </div>
        </div>
    </div>
@endsection
