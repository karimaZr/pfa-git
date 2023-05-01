@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header">{{ __('Créer un nouvel élément de module') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('element_modules.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="coefficient" class="col-md-4 col-form-label text-md-right">{{ __('Coefficient') }}</label>

                                <div class="col-md-6">
                                    <input id="coefficient" type="number" class="form-control @error('coefficient') is-invalid @enderror" name="coefficient" value="{{ old('coefficient') }}" required autocomplete="coefficient">

                                    @error('coefficient')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="module_id" class="col-md-4 col-form-label text-md-right">{{ __('Module') }}</label>

                                <div class="col-md-6">
                                    <select id="module_id" class="form-control @error('module_id') is-invalid @enderror" name="module_id" required autocomplete="module_id">
                                        <option value="">-- Sélectionner un module --</option>
                                        @foreach ($modules as $module)
                                            <option value="{{ $module->id }}" @if(old('module_id')==$module->id) selected @endif>{{ $module->nom }}</option>
                                        @endforeach
                                    </select>

                                    @error('module_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('Professeur responsable') }}</label>

                                <div class="col-md-6">
                                    <select id="user_id" class="form-control">
                                        <option value="">-- Sélectionner un professeur --</option>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}" @if(old('user_id')==$user->id) selected @endif>{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')       

