@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">    <h1>Liste des filières</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Abréviation</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->Nom }}</td>
                    <td>{{ $filiere->abreviation }}</td>
                    <td>{{ $filiere->Niveau }}</td>
                    <td>
                        <a href="{{ route('filieres.edit', $filiere->id) }}">Modifier</a>
                        <form action="{{ route('filieres.destroy', $filiere->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('filieres.create') }}">Ajouter une filière</a>
    @include('layouts.footer')       
