

  <!-- Modal -->
  <div class="modal fade" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau cours</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <input type="hidden" name="created_by" id="created_by" value=" {{ Auth::user()->id }}" >
        <input type="hidden" name="publier" id="pubier" value="0" >
<!-- Course Name Field -->
<div class="form-group ">
    {!! Form::label('course_name', 'Nom du cours:') !!}
    {!! Form::text('course_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Course Code Field -->
<div class="form-group ">
    {!! Form::label('course_code', 'Code du cours:') !!}
    {!! Form::text('course_code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group ">
    {!! Form::label('description', 'Description:', 'required') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'cols'=>40, 'rows'=>2]) !!}
</div>



<input type="file" name="filename" id="filename" >

{{-- <button type="button" class="btn btn-primary" >Ajouter une vidéo</button> --}}


<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Ajouter une vidéo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"  title="" data-original-title="Collapse">
        <i class="fa fa-minus"></i></button>
      {{-- <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove"> --}}
        {{-- <i class="fa fa-times"></i></button> --}}
    </div>
  </div>
  <div class="box-body" style="">
    <p><input type="text" name="title_video" placeholder="Entrer le titre de la video" /></p>
    <p><textarea name="description_video" cols="30" rows="5" placeholder="Description de la video"></textarea></p>
   
  </div>
  <!-- /.box-body -->
  <div class="box-footer" style="">
    <p><input type="file" name="video" /></p>
  </div>
  <!-- /.box-footer-->
</div>










</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer le cours', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>



