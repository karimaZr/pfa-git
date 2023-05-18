@extends('backend.layouts.app')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Modifier un module</h1>
                <form action="{{ route('modules.update', $module->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Code">Code :</label>
                        <input type="text" name="code" id="Code" class="form-control" value="{{ $module->Code }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Nom">Nom :</label>
                        <input type="text" name="Nom" id="nom" class="form-control" value="{{ $module->Nom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="filiere_id">Filière :</label>
                        <select name="filiere_id" id="filiere_id" class="form-control" required>
                            @foreach ($filieres as $filiere)
                                <option value="{{ $filiere->id }}" {{ $module->filiere_id == $filiere->id ? 'selected' : '' }}>
                                    {{ $filiere->Nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semestre">Semestre :</label>
                        <select name="semestre" id="semestre" class="form-control" required>
                            <option value="1" {{ $module->semestre == 1 ? 'selected' : '' }}>S 1</option>
                            <option value="2" {{ $module->semestre== 2 ? 'selected' : '' }}>S 2</option>
                            <!-- Ajoutez les autres options de semestre ici -->
                        </select>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
@endsection
