<!-- Course Name Field -->
<div class="form-group">
    {!! Form::label('course_name', 'Nom du cours:') !!}
    <p>{{ $course->course_name }}</p>
</div>

<!-- Course Code Field -->
<div class="form-group">
    {!! Form::label('course_code', 'Code du code:') !!}
    <p>{{ $course->course_code }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $course->description }}</p>
</div>

{{-- <!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $course->status }}</p>
</div>
 --}}
