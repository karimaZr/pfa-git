@extends('backend.layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Liste des éléments de module') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>{{ __('Code') }}</th>
                                    <th>{{ __('Nom') }}</th>
                                    <th>{{ __('Coefficient') }}</th>
                                    <th>{{ __('Module') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($element_modules))
                                     @foreach ($element_modules as $element_module)
                                    <tr>
                                        <td>{{ $element_module->Code }}</td>
                                        <td>{{ $element_module->Nom }}</td>
                                        <td>{{ $element_module->coifficent }}</td>
                                        <td>{{ $element_module->module->Nom }}</td>
                                        <td>
                                            <form action="{{ route('element_modules.destroy', $element_module->id) }}" method="POST">
                                                <a href="{{ route('element_modules.edit', $element_module->id) }}" class="btn btn-primary">{{ __('Modifier') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">{{ __('Supprimer') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
