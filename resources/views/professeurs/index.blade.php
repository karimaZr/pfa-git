@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
        <h1>Liste des professeurs</h1>

        <a href="{{ route('professeurs.create') }}" class="btn btn-primary mb-3">Ajouter un professeur</a>

        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Specialite</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($professeurs as $professeur)
                <tr>
                    <td>{{ $professeur->id }}</td>
                    <td>{{ $professeur->Nom }}</td>
                    <td>{{ $professeur->Prenom }}</td>
                    <td>{{ $professeur->Email }}</td>
                    <td>{{ $professeur->specialite }}</td>
                    <td>
                        <a href="{{ route('professeurs.edit', $professeur->id) }}" class="btn btn-primary">Editer</a>

                        <form action="{{ route('professeurs.destroy', $professeur->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce professeur ?')">Supprimer</button>
                        </form>                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('layouts.footer')       

