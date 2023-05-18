@extends('backend.layouts.app')
@section('content')
<h1>Modifier le mot de passe</h1>

<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <div class="form-group">
        <label for="current_password">Mot de passe actuel</label>
        <input type="password" name="current_password" id="current_password" class="form-control">
        @error('current_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="new_password">Nouveau mot de passe</label>
        <input type="password" name="new_password" id="new_password" class="form-control">
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">Confirmer le nouveau mot de passe</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Modifier le mot de passe</button>
</form>
@endsection