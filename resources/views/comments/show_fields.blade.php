<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $comments->created_by }}</p>
</div>

<!-- Actu Id Field -->
<div class="form-group">
    {!! Form::label('actu_id', 'Actu Id:') !!}
    <p>{{ $comments->actu_id }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $comments->body }}</p>
</div>

