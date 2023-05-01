@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                
             <h1>Liste des modules</h1>
                <a href="{{ route('modules.create') }}" class="btn btn-primary mb-3">Ajouter un module</a>
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Filière</th>
                    <th>Actions</th>
                    <th>Composente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modules as $module)
                    <tr>
                        <td>{{ $module->Code }}</td>
                        <td>{{ $module->Nom }}</td>
                        <td>{{ $module->filiere->Nom }}</td>
                        <td>
                            <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce module ?')">Supprimer</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('modules.show', $module->id) }}" class="btn btn-info">etudiants</a>
                            <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-warning">Element_Module</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        </div></div></div>
        @include('layouts.footer')       
