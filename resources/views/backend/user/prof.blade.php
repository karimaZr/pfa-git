@extends('backend.layouts.app')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <h1>Liste des étudiants</h1>

                <table id="example1" class="table">

                    <thead>
                        <tr>
                            <th>module</th>
                            <th>note</th>
                            <th>Nom/prenom</th>
                            <th>note</th>


                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($notes as $key => $note)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $note->module }}</td>
                                <td>{{ $note->filiere }}</td>
                                <td>{{ $note->user }}</td>
                                <td>{{ $note->note }}</td>
                            </tr>
                        @endforeach




                    </tbody>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
