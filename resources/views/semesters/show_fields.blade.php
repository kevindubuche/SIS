<!-- Semester Name Field -->
<div class="form-group">
    {!! Form::label('semester_name', 'Nom du semestre:') !!}
    <p>{{ $semester->semester_name }}</p>
</div>

<div class="form-group">
    {!! Form::label('semester_name', 'Annees academique:') !!}
    <p>{{ $semester->semester_year }}</p>
</div>


<!-- Semester Code Field -->
<div class="form-group">
    {!! Form::label('semester_code', 'Code du semestre:') !!}
    <p>{{ $semester->semester_code }}</p>
</div>

<!-- Semester Duration Field -->
<div class="form-group">
    {!! Form::label('semester_duration', 'Duree:') !!}
    <p>{{ $semester->semester_duration }}</p>
</div>

<!-- Semester Description Field -->
<div class="form-group">
    {!! Form::label('semester_description', 'Description:') !!}
    <p>{{ $semester->semester_description }}</p>
</div>

