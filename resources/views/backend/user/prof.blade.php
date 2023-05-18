@extends('backend.layouts.dashboard')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="card-body">
                    <h1 class="text-center text-uppercase font-weight-bold pt-2">Liste des étudiants</h1>
                   
                    @if(!empty($notes[0]->note))
                    <form action="{{ route('update', ['idelement' =>$id]) }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>CNE</th>
                                    <th>Nom/prenom</th>
                                    <th>note</th>
                                    <th>session</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($notes as $key => $note) 
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $note->CNE }}</td>
                                        <td>{{ $note->user }}</td>
                                        <td>
                                        
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="note" name="notes[{{ $note->id_user }}]"  min="0" max="20" placeholder="entrer la note" value="{{$note->note}}" required>
                                                <input type="hidden" class="form-control" id="id_user" name="userIds[{{ $note->id_user }}]"  value="{{$note->id_user}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" name="sessions[{{ $note->id_user }}]" required>
                                                    <option value="NORMAL" {{ $note->session == 'NORMAL' ? 'selected' : '' }}>NORMAL</option>
                                                    <option value="RAT" {{ $note->session == 'RAT' ? 'selected' : '' }}>RAT</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $element = $note->id_element;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group notes mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                                <a href="{{ route('export', ['id' => $element]) }}" class="btn btn-secondary">Valider</a>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('add1', ['idelement' =>$id]) }}" method="POST">
                        @csrf
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>CNE</th>
                                    <th>Nom/prenom</th>
                                    <th>note</th>
                                    <th>session</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $key => $note)
                                   
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $note->CNE }}</td>
                                        <td>{{ $note->user }}</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="number" class="form-control" id="note" name="notes[{{ $note->id_user }}]"  min="0" max="20" placeholder="entrer la note" required>
                                                <input type="hidden" class="form-control" id="id_user" name="userIds[{{ $note->id_user }}]"  value="{{$note->id_user}}">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <select class="form-control" name="sessions[{{ $note->id_user }}]" required>
                                                    <option value="" selected>Choisir une session</option>
                                                    <option value="NORMAL">NORMAL</option>
                                                    <option value="RAT">RAT</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $element = $note->id_element;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group notes mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                <a href="{{ route('export', ['id' => $element]) }}" class="btn btn-secondary">Valider</a>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
