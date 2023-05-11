@extends('backend.layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">{{ __('Modifier l\'élément de module') }}</div>
                <div class="card-body">
                    <form action="{{ route('element_modules.update', $element_module->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="Code" class="form-label">{{ __('Code') }}</label>
                            <input type="text" name="Code" class="form-control" id="Code" value="{{ $element_module->Code }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nom" class="form-label">{{ __('Nom') }}</label>
                            <input type="text" name="Nom" class="form-control" id="Nom" value="{{ $element_module->Nom }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="coifficent" class="form-label">{{ __('coefficient') }}</label>
                            <input type="number" name="coifficent" class="form-control" id="coifficent" value="{{ $element_module->coifficent }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="module" class="form-label">{{ __('Module') }}</label>
                            <select name="module" class="form-select" id="module" required>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}" {{ $element_module->module_id == $module->id ? 'selected' : '' }}>{{ $module->Nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="professeur" class="form-label">{{ __('Professeur responsable') }}</label>
                            <select name="professeur" class="form-select" id="professeur">
                                <option value="" {{ is_null($element_module->user_id) ? 'selected' : '' }}>{{ __('Aucun') }}</option>
                                @foreach ($professeurs as $professeur)
                                    <option value="{{ $professeur->id }}" {{ $element_module->user_id == $professeur->id ? 'selected' : '' }}>{{ $professeur->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
