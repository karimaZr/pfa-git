@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
        <h1>{{ $filiere->Nom }}</h1>
        <p><strong>Abréviation:</strong> {{ $filiere->abreviation }}</p>
        <p><strong>Niveau:</strong> {{ $filiere->Niveau }}</p>
        <a href="{{ route('filieres.index') }}" class="btn btn-primary">Retour</a>
    </div>
    @include('layouts.footer')       


