@extends('backend.layouts.app')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header">{{ __('Ajouter un élément de module') }}</div>
                <div class="card-body">
                    <form action="{{ route('element_modules.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="Code" class="form-label">{{ __('Code') }}</label>
                            <input type="text" name="Code" class="form-control" id="Code" required>
                        </div>
                        <div class="mb-3">
                            <label for="Nom" class="form-label">{{ __('Nom') }}</label>
                            <input type="text" name="Nom" class="form-control" id="Nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="coifficent" class="form-label">{{ __('Coefficient') }}</label>
                            <input type="number" name="coifficent" class="form-control" id="coifficent" required>
                        </div>
                        <div class="mb-3">
                            <label for="module" class="form-label">{{ __('Module') }}</label>
                            <select name="module" class="form-select" id="module" required>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->Nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">{{ __('Professeur responsable') }}</label>
                            <select name="user_id" class="form-select" id="user_id">
                                <option value="" selected>{{ __('Aucun') }}</option>
                                @foreach ($professeurs as $professeur)
                                    <option value="{{ $professeur->id }}">{{ $professeur->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Ajouter') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
