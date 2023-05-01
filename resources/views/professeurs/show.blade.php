@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
        <h1>Détails du professeur {{ $professeur->Nom }} {{ $professeur->Prenom }}</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom :</th>
                    <td>{{ $professeur->Nom }}</td>
                </tr>
                <tr>
                    <th>Prénom :</th>
                    <td>{{ $professeur->Prenom }}</td>
                </tr>
                <tr>
                    <th>Email :</th>
                    <td>{{ $professeur->Email }}</td>
                </tr>
                <tr>
                    <th>Spécialité :</th>
                    <td>{{ $professeur->Specialite }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    @include('layouts.footer')       
