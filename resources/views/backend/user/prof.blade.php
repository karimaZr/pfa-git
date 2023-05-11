@extends('backend.layouts.dashboard')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h1 class="text-center text-uppercase font-weight-bold pt-2">Liste des étudiants</h1>
                    <table class=" table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>id</th>
                                <th>CNE</th>
                                <th>Nom/prenom</th>
                                <th>note</th>
                                <th>Action</th>
                               


                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($notes as $key => $notes)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $notes->CNE }}</td>
                                    <td>{{ $notes->user }}</td>
                                    @if ($notes->note)
                                    <td>{{ $notes->note }}</td>
                                    @else  
                                    <td></td>
                                    @endif
                                    
                                   
                                

                                    <td>
                                       
                                        @php
                                        $element= $notes->id_element
                                        @endphp
                                        @if ($notes->note)
                                        
                                         <a href="{{ route('modify', ['iduser' => $notes->id_user, 'idelement' => $notes->id_element]) }}"
                                                class="btn btn-warning">Modifier</a>
                                        @else
                                        <a href="{{ route('edit', ['iduser' => $notes->id_user, 'idelement' => $notes->id_element]) }}"
                                            class="btn btn-warning">Ajouter</a>
                                        @endif
                                       
                                    </td>
                                </tr>
                            @endforeach
                         
                           
                        </tbody>


                        
                    </table>
                    <div class="form-group notes mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('export',['id'=>$element]) }}" class="btn btn-secondary">Valider</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
