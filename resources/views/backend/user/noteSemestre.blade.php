@extends('backend.layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h1 class="text-center text-uppercase font-weight-bold pt-2"> Gestion des notes</h1>
                    <div class="text-center font-weight-bold text-uppercase mt-4">
                        <p>CNE: {{ auth()->user()->CNE }}</p>
                    </div>
                    <div class="text-center font-weight-bold text-uppercase mt-4">
                        <p>Nom Prenom: {{ auth()->user()->name }}
                    </div>
                    <table id="example1" class=" table table-bordered table-striped">
                        <thead>

                            <tr>
                                <th>Semestre</th>
                                <th>Note</th>
                                <th>Résultat</th>
                            </tr>


                        </thead>

                        <tbody>
                            <tr>
                                <td>Semestre 1</td>
                                @php
                                    $total_notes = 0;
                                    
                                @endphp

                                @foreach ($notesS1 as $note)
                                    @php
                                        $total_notes += $note->module_note;
                                        
                                    @endphp
                                @endforeach

                                @php
                                    $note_moyenne1 = $moduleCountS1->count > 0 ? $total_notes / $moduleCountS1->count : 0;
                                @endphp
                                <td>{{ number_format($note_moyenne1, 2) }}</td>
                                @if (auth()->user()->filiere == '2AP')
                                    @if ($note_moyenne1 >= 10)
                                        <td> validé</td>
                                    @else
                                        <td> non validé</td>
                                    @endif
                                @else
                                    @if ($note_moyenne1 >= 12)
                                        <td> validé</td>
                                    @else
                                        <td> non validé</td>
                                    @endif
                                @endif
                            </tr>
                            <tr>
                                <td>Semestre 2</td>
                                @if($notesS2)
                                    @php
                                        $total_notes = 0;
                                        
                                    @endphp

                                    @foreach ($notesS2 as $note)
                                        @php
                                            $total_notes += $note->module_note;
                                            
                                        @endphp
                                    @endforeach

                                    @php
                                        $note_moyenne2 = $moduleCountS2->count > 0 ? $total_notes / $moduleCountS2->count : 0;
                                    @endphp
                                    <td>{{ number_format($note_moyenne2, 2) }}</td>XA
                                    @if (auth()->user()->filiere == '2AP')
                                        @if ($note_moyenne2 >= 10)
                                            <td> validé</td>
                                        @else
                                            <td> non validé</td>
                                        @endif
                                    @else
                                        @if ($note_moyenne2 >= 12)
                                            <td> validé</td>
                                        @else
                                            <td> non validé</td>
                                        @endif
                                    @endif
                                @endif
                            </tr>
                        </tbody>

                    </table>
                    <div class="text-center font-weight-bold text-uppercase mt-4">
                        <p>Note generale : {{ number_format(($note_moyenne1 + $note_moyenne2) / 2, 2) }}</p>
                    </div>
                    <div class="form-group notes mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('home') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    @endsection
