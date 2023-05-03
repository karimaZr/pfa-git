@extends('backend.layouts.dashboard')
@section('content')
    <div class="container-fluid ">
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
                                <td>{{ $note->note }}</td>

                                <td>
                                    <a href="{{ route('edit', ['iduser' => $note->id_user, 'idelement' => $note->id_element]) }}"
                                        class="btn btn-warning">Modifier</a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>


                   
                </table>
            </div>
        </div>
    </div>
@endsection
