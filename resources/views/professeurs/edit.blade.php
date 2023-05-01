@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
        <h1>Modification du professeur {{ $professeur->Nom }} {{ $professeur->Prenom }}</h1>
        <form action="{{ route('professeurs.update', $professeur) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $professeur->Nom }}">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $professeur->Prenom }}">
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $professeur->Email }}">
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité :</label>
                <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $professeur->Specialite }}">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
    @include('layouts.footer')       

