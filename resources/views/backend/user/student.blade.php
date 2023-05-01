@extends('backend.layouts.app')
@section('content')
    <div class="content-wrapper">

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-white">
                            <div class="card-header card-color">
                                <p class="h2 text-center text-uppercase font-weight-bold pt-2">Gestion des notes</p>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>module</th>
                                            <th>note</th>
                                            <th>Nom/prenom</th>
                                            <th>note</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($notes as $note)
                                            @if ($notes->role == 'Etudiant')
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $note->module }}</td>
                                                    <td>{{ $note->filiere }}</td>
                                                    <td>{{ $note->user }}</td>
                                                    <td>{{ $note->note }}</td>
                                                </tr>
                                            @endif
                                        @endforeach




                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </section>
    </div>
@endsection
