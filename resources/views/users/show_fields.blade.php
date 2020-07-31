<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Prenom:') !!}
    <p>{{ $user->first_name }}</p>
</div>
<div class="form-group">
    {!! Form::label('name', 'Nom:') !!}
    <p>{{ $user->last_name }}</p>
</div>


<!-- Role Field -->
<div class="form-group">
    {!! Form::label('role', 'Role:') !!}
    <p>{{ $user->role }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div> --}}

<!-- Password Field -->
{{-- <div class="form-group">
    {!! Form::label('password', 'Mot de passe:') !!}
    <p>{{ $user->password }}</p>
</div> --}}

<!-- Remember Token Field -->
{{-- <div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div> --}}

<div class="form-group">
    {!! Form::label('created_at', 'Date de creaion:') !!}
    <p>{{ $user->created_at }}</p>
</div>

