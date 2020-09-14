

{{-- 
            <form action="{{route('exams.update', 'exam_id2')}}" 
            method="post"
            enctype="multipart/form-data">   

                @csrf
                @method('PUT') --}}

<input type="hidden" id="exam_id2" name="exam_id2" value="{{$exam->exam_id}}">
<div class="form-group col-sm-6">
    <label>Matieres</label>
    <select class="form-control" name="matiere_id2" id="matiere_id2">
    <option value="0" selected="true" disabled="true">Matieres </option>

      @foreach($allMatieres as $matiere)
      @if ($matiere->teacher_id == Auth::user()->id || Auth::user()->role==1)
      <option value="{{$matiere->matiere_id}}">{{$matiere->titre}}</option>
@endif
@endforeach
  </select>
</div>

{{-- <div class="form-group col-sm-6">
    <select class="form-control" name="class_id2" id="class_id2">
    <option value="0" selected="true" disabled="true">Classe </option>

        @foreach ($allClassAssignins as $class)
        @if ($class->teacher_id == Auth::user()->id || Auth::user()->role==1)
        <option value="{{$class->InfoClass->class_id}}">{{$class->InfoClass->class_name}}</option>
        @endif
        @endforeach
  </select>
</div> --}}

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title2', 'Titre:') !!}
    {!! Form::text('title2', $exam->title, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description2', 'Description:') !!}
    {!! Form::textarea('description2', $exam->description, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12">
<input type="file" name="filename" id="filename" >
</div>

{{-- sa se pou publier ka pa null nan database la --}}
@if(Auth::user()->role != 1)
<input type="hidden" id="publier" name="publier" value="{{$exam->publier}}">
@endif

@if(Auth::user()->role == 1)
<div class="col-sm-4">
  <div class="form-group " style="background-color: burlywood">
      <fieldset>
          <legend for="gender">Accepter la publication (Administrateur)*</legend>
          <table style="width: 100%; margin-top:14px;">
              <tr style="border-bottom: 1px solid #ccc">
                  <td>
                      <label>
                          <input type="radio" name="publier" id="pubier" @if($exam->publier ==0)  checked @endif value="0" >
                         <strong style="color: red"> NON </strong>
                      </label>
                  </td>
                  <td>
                      <label>
                          <input type="radio" name="publier" id="pubier" @if($exam->publier ==1)checked @endif value="1" >
                          <strong style="color: green"> OUI </strong>
                      </label>
                  </td>
              </tr>
          </table>
      </fieldset>
  </div>  
</div>
</div>

@endif



<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Modifier</button>
</div>
        {{-- </form> --}}



























