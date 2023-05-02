@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1 class="text-center text-uppercase font-weight-bold pt-2">Liste des étudiants</h1>

                <table id="example1" class=" table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>id</th>
                            <th>CNE</th>
                            <th>Nom/prenom</th>
                            <th>note</th>
                            <th>action</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($notes as $key => $note)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $note->CNE }}</td>
                                <td>{{ $note->user }}</td>
                                <td>{{ $note->note}}</td>
                                <td>
                                    <a href="{{ route('edit', ['iduser' => $note->id_user, 'idmodule' => $note->id_module]) }}" class="btn btn-warning">Modifier</a>
    
                                </td>
                            </tr>
                        @endforeach




                    </tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
