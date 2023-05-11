@extends('backend.layouts.dashboard')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h1 class="text-center text-uppercase font-weight-bold pt-2">Liste des étudiants</h1>
                        <h6> Filiere: {{$note->filiere}}</h6>
                        <h6> Elément : {{$note->element}}</h6>
                   
                        <table id="example1" class=" table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>CNE</th>
                                    <th>Nom/prenom</th>
                                    <th>note</th>
                        
    
    
                                </tr>
                            </thead>
                            <tbody>
    
                                @foreach ($notes as $key => $note)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $note->CNE }}</td>
                                        <td>{{ $note->user }}</td>
                                        <td>{{ $note->note }}</td>
                                    </tr>
                                @endforeach
                             
                               
                            </tbody>
    
    
                            
                        </table>
                   
                </div>
            </div>
        </div>
    </div>
    @endsection
