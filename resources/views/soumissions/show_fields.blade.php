<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', 'Course Id:') !!}
    <p>{{ $soumission->course_id }}</p>
</div>

<!-- Class Id Field -->
<div class="form-group">
    {!! Form::label('class_id', 'Class Id:') !!}
    <p>{{ $soumission->class_id }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $soumission->description }}</p>
</div>

<!-- Filename Field -->
<div class="form-group">
    {!! Form::label('filename', 'Filename:') !!}
    <p>{{ $soumission->filename }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $soumission->created_by }}</p>
</div>

