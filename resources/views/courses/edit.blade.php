@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cours
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($course, ['route' => ['courses.update', $course->course_id], 'method' => 'patch',     'enctype'=>'multipart/form-data']) !!}
                   
                      @csrf
   
                        <!-- Course Name Field -->
                        <input type="hidden" id="created_by" name="created_by" value="{{$course->created_by}}">

                        
<!-- Course Name Field -->
<div class="form-group col-md-6">
  {!! Form::label('course_name', 'Nom du cours:') !!}
  {!! Form::text('course_name', null, ['class' => 'form-control', 'maxlength'=>'250','required']) !!}
</div>



<!-- Description Field -->
<div class="form-group col-md-6 ">
  {!! Form::label('description', 'Description:', 'required') !!}
  {!! Form::textarea('description', null, ['class' => 'form-control', 'cols'=>40, 'rows'=>2 , 'maxlength'=>'250']) !!}
</div>

<div class="form-group col-md-12 ">
  <label>Contenu</label>
<textarea id="my-summernote" name="editordata">{!! $course->contenu !!}</textarea>
</div>

<div class="form-group col-md-12">
  <label>Importer un document</label>
<input type="file" name="filename" id="filename" accept="[everything but .exe and .app and .mp4 and .avi]">
</div>

<div class="form-group col-md-12 ">
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
  <label>Titre de la video</label>
  <p><input type="text" name="videoLink" placeholder="Entrer le titre de la video" 
    {{-- @if($course->videoLink)
    value="https://www.youtube.com/watch?v={{$course->videoLink}}"
    @endif --}}
    /></p>
 <label>Description de la video</label>
  <p><textarea name="description_video" cols="30" rows="5" placeholder="Description de la video"></textarea></p> 
  
</div>
<!-- /.box-body -->
<div class="box-footer" style="">
  <label>Importer la video</label>
  <p><input type="file" name="video" accept="video/mp4,video/avi,video/mov,video/gif,video/wmv"/></p>
</div>
<!-- /.box-footer-->
</div>

@if(Auth::user()->role == 1)
<div class="col-sm-4">
  <div class="form-group " style="background-color: burlywood">
      <fieldset>
          <legend for="gender">Accepter la publication (Administrateur)*</legend>
          <table style="width: 100%; margin-top:14px;">
              <tr style="border-bottom: 1px solid #ccc">
                  <td>
                      <label>
                          <input type="radio" name="publier" id="pubier" @if($course->publier ==0)  checked @endif value="0" >
                         <strong style="color: red"> NON </strong>
                      </label>
                  </td>
                  <td>
                      <label>
                          <input type="radio" name="publier" id="pubier" @if($course->publier ==1)checked @endif value="1" >
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
  {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button> --}}
  {!! Form::submit('Modifier Cours', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection



@push('scripts')
<script>

//Bootstrap 4 + daemonite material UI + Summernote wysiwyg text editor
//doc : https://github.com/summernote/summernote

$('#my-summernote').summernote({
  minHeight: 100,
  placeholder: 'Write here ...',
  focus: false,
  airMode: false,
  fontNames: ['Roboto', 'Calibri', 'Times New Roman', 'Arial'],
  fontNamesIgnoreCheck: ['Roboto', 'Calibri'],
  dialogsInBody: true,
  dialogsFade: true,
  disableDragAndDrop: false,
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['para', ['style', 'ul', 'ol', 'paragraph']],
    ['fontsize', ['fontsize']],
    ['font', ['strikethrough', 'superscript', 'subscript']],
    ['height', ['height']],
    ['misc', ['undo', 'redo', 'print', 'help', 'fullscreen']]
  ],
  popover: {
    air: [
      ['color', ['color']],
      ['font', ['bold', 'underline', 'clear']]
    ]
  },
  print: {
    //'stylesheetUrl': 'url_of_stylesheet_for_printing'
  }
});
$('#my-summernote2').summernote({airMode: false,placeholder:'Try the airmode'});

</script>
@endpush