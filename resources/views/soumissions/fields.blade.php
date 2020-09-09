  <!-- Modal -->
  <div class="modal fade" id="add-soumission-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nouvelle soumission</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >

{{-- <!-- Course Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('exam_id', 'Examen:') !!}
    {!! Form::number('exam_id', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Class Id Field -->
<div class="form-group col-sm-4">
    <select class="form-control" name="exam_id" id="exam_id" required>
        <option value="0" selected="false" disabled="true">Examen</option>
        @if(Auth::user()->role ==3)
            @foreach($exams as $exam)
            {{-- si classe exam nan se class elev la --}}
            @if($exam->GetClass($exam->exam_id)->class_id == $exam->GetConnectedStudent(Auth::user()->id)->class_id)
        <option value="{{$exam->exam_id}}">{{$exam->title}}</option>
        @endif
     
        @endforeach
        @endif
    </select>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Commentaire:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Filename Field -->
<div class="form-group col-sm-6">
    {!! Form::label('filename', 'Filename:') !!}
    {!! Form::text('filename', null, ['class' => 'form-control']) !!}
</div> --}}
<input type="file" name="filename" id="filename" required>


{{-- <!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div> --}}

<!-- Submit Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('soumissions.index') }}" class="btn btn-default">Cancel</a>
</div> --}}


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Soumettre', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>
