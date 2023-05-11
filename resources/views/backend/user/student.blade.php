@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h1 class="text-center text-uppercase font-weight-bold pt-2">Gestion des notes</h1>
                    <table id="example1" class=" table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Module</th>
                                <th>Session</th>
                                <th>Résultat</th>
                                <th>Note</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $row)
                                <tr>
                                    <td>{{ $row->module_name }}</td>
                                    <td>{{ $row->session }} {{ $row->annee }}</td>
                                    @if ($row->filiere == '2AP')
                                        @if ($row->module_note >= 10)
                                            <td> validé</td>
                                        @else
                                            <td> non validé</td>
                                        @endif
                                    @else
                                        @if ($row->module_note >= 12)
                                            <td> validé</td>
                                        @else
                                            <td> non validé</td>
                                        @endif
                                    @endif
                                    <td>{{ number_format($row->module_note, 2) }}</td>


                                </tr>
                            @endforeach

                            @php
                                $total_notes = 0;
                                
                            @endphp

                            @foreach ($notes as $note)
                                @php
                                    $total_notes += $note->module_note;
                                    
                                @endphp
                            @endforeach

                            @php
                                $note_moyenne = $moduleCount->count > 0 ? $total_notes / $moduleCount->count : 0;
                            @endphp



                        </tbody>


                    </table>
                    <div class="text-center font-weight-bold text-uppercase mt-4">
                        <p>Note Semestre : {{ number_format($note_moyenne, 2) }}</p>
                    </div>
                    <div class="form-group notes mb-0">
                      <div class="col-md-6 offset-md-4">
                          <a href="{{ route('home') }}" class="btn btn-secondary">Retour</a>
                      </div>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    @endsection
