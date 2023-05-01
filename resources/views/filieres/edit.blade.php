@include('layouts.index')
@include('layouts.sidbar')
@include('layouts.navbar')

            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
       
                <div class="panel panel-default">
                    <div class="panel-heading">Modifier une filière</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('filieres.update', $filiere->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group{{ $errors->has('Nom') ? ' has-error' : '' }}">
                                <label for="Nom" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="Nom" type="text" class="form-control" name="Nom" value="{{ $filiere->Nom }}" required autofocus>

                                    @if ($errors->has('Nom'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Nom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('abriviation') ? ' has-error' : '' }}">
                                <label for="abriviation" class="col-md-4 control-label">Abréviation</label>

                                <div class="col-md-6">
                                    <input id="abriviation" type="text" class="form-control" name="abriviation" value="{{ $filiere->abriviation }}" required>

                                    @if ($errors->has('abriviation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('abriviation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Niveau') ? ' has-error' : '' }}">
                                <label for="Niveau" class="col-md-4 control-label">Niveau</label>

                                <div class="col-md-6">
                                    <input id="Niveau" type="number" class="form-control" name="Niveau" value="{{ $filiere->Niveau }}" required>

                                    @if ($errors->has('Niveau'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Niveau') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enregistrer
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </div> @include('layouts.footer')       


