<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'Prenom:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Nom:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
</div>


<!-- Role Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::number('role', null, ['class' => 'form-control', 'required']) !!}
</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('role', 'Role:') !!}
    <select class="form-control" name="role" id="role" required>
        <option value="0" selected="false" disabled="true">Role</option>
    
        <option value="1" @if($user->role == 1) selected="true" @endif>Administrateur</option>
        <option value="2" @if($user->role == 2) selected="true" @endif>Professeur</option>
        <option value="3" @if($user->role == 3) selected="true" @endif>Eleve</option>
      
    </select>
</div>



<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Email Verified At Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::text('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div> --}}

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Mot de passe:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required']) !!}
</div>

<!-- Remember Token Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Annuler</a>
</div>
