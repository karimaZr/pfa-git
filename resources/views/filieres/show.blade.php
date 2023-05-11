@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h3>Detail de la filiere {{ $filiere->Nom }}</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th> Nom:</th>
                            <td>{{ $filiere->Nom }}</td>
                           
                        </tr>
                        <tr>
                            <th> Abréviation:</th>
                            <td>{{  $filiere->abriviation }}</td>
                           
                        </tr>
                        <tr>
                            <th> Niveau:</th>
                            <td>{{ $filiere->Niveau }}</td>
                           
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('filiere.index') }}" class="btn btn-primary">Retour</a>

            </div>
        @endsection
       
