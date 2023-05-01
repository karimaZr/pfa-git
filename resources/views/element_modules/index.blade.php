@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
    <div class="card">
    <div class="card-header">{{ __('Liste des éléments de module') }}</div>
        <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ route('element_modules.create') }}" class="btn btn-primary">{{ __('Ajouter un élément de module') }}</a>
                            </div>
                            <div class="col-sm-8">
                                <form action="{{ route('element_modules.index') }}" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" class="form-control" placeholder="{{ __('Rechercher...') }}" value="{{ request('search') }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">{{ __('Rechercher') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                            <td>{{ $element_module->module->nom }}</td>
                                            <td>{{ $element_module->user->name }}</td>
                                            <td>
                                                <a href="{{ route('element_modules.edit', $element_module) }}" class="btn btn-sm btn-primary">{{ __('Modifier') }}</a>
                                                <form action="{{ route('element_modules.destroy', $element_module) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">{{ __('Supprimer') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    
                        <div class="d-flex justify-content-center">
                            {{ $element_modules->appends(request()->except('page'))->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')       

    