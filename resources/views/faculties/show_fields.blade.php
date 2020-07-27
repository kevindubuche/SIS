<!-- Faculty Name Field -->
<div class="form-group">
    {!! Form::label('faculty_name', 'Nom de la Faculté:') !!}
    <p>{{ $faculty->faculty_name }}</p>
</div>

<!-- Faculty Code Field -->
<div class="form-group">
    {!! Form::label('faculty_code', 'Code de la Faculté:') !!}
    <p>{{ $faculty->faculty_code }}</p>
</div>

<!-- Faculty Description Field -->
<div class="form-group">
    {!! Form::label('faculty_description', 'Description:') !!}
    <p>{{ $faculty->faculty_description }}</p>
</div>

{{-- <!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $faculty->status }}</p>
</div> --}}

