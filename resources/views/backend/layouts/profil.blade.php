@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <div class="container-fluid pt-4 px-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <h1>Détails du {{ auth()->user()->role }}</h1>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Nom et Prénom:</th>
                                            <td>{{ auth()->user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ auth()->user()->email }}</td>
                                        </tr>
                                        @if (auth()->user()->role == 'professeur')
                                            <tr>
                                                <th>Spécialitée :</th>
                                                <td>{{ auth()->user()->spécialité }}</td>
                                            </tr>
                                        @elseif(auth()->user()->role == 'Etudiant')
                                            <tr>
                                                <th>CNE :</th>
                                                <td>{{ $user->CNE }}</td>
                                            </tr>
                                            <tr>
                                                <th>date de naissance :</th>
                                                <td>{{ auth()->user()->date_de_naissance }}</td>
                                            </tr>
                                            <tr>
                                                <th>Filiere :</th>
                                                <td>{{ $user->filiere->Nom ?? 'N/A' }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Photo :</th>
                                            @if (auth()->user()->role == 'Etudiant')
                                                <td><img src="backend2\img\testimonial-1.jpg"
                                                        style="width: 50px; height: 50px;"></td>
                                            @else
                                                <td><img src="backend2\img\testimonial-2.jpg"
                                                        style="width: 50px; height: 50px;"></td>
                                            @endif

                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                @endsection
