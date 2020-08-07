@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Professeur
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
               
                   {!! Form::model($teacher, ['route' => ['teachers.update', $teacher->teacher_id], 'method' => 'patch',  'enctype'=>'multipart/form-data']) !!}

                   <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}" required>
                   <input type="hidden" name="dateRegistered" id="dateRegistered" 
                   value="{{date('Y-m-d')}}">
                 
        <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}" required>
        <input type="hidden" name="dateRegistered" id="dateRegistered" 
        value="{{date('Y-m-d')}}">
<!-- First Name Field -->
<div class="form-group col-sm-12">
    <label >Nom</label>
<input type="text" 
    name="first_name"
    id="first_name" 
    class="form-control text-capitalize"
    placeholder="Prenom"
    value="{{$teacher->first_name}}"
    >
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-12">
    <label >Prenom</label>
<input type="text" 
    name="last_name"
    id="last_name" 
    class="form-control text-capitalize"
    placeholder="Nom"
    value="{{$teacher->last_name}}"
    >
</div>

<!-- Gender Field -->
<div class="col-sm-12">
<div class="form-group ">
    <fieldset>
        <legend for="gender">Sexe</legend>
        <table style="width: 100%; margin-top:14px;">
            <tr style="border-bottom: 1px solid #ccc">
                <td>
                    <label>
                        <input type="radio" name="gender" id="gender" value="0" checked>
                        Masculin
                    </label>
                </td>
                <td>
                    <label>
                        <input type="radio" name="gender" id="gender" value="1">
                        Feminin
                    </label>
                </td>
            </tr>
        </table>
    </fieldset>
</div>  
</div>

<!-- Status Field -->
<div class="col-sm-12">
<div class="form-group ">
    <fieldset>
        <legend for="gender">Status matrimonial</legend>
        <table style="width: 100%; margin-top:14px;">
            <tr style="border-bottom: 1px solod #ccc">
                <td>
                    <label>
                        <input type="radio" name="status" id="status" value="0" required checked>
                        Celibataire
                    </label>
                </td>
                <td>
                    <label>
                        <input type="radio" name="status" id="status" value="1" required>
                        Fiance(e)
                    </label>
                </td>
                <td>
                    <label>
                        <input type="radio" name="status" id="status" value="2" required>
                        Marie(e)
                    </label>
                </td>
                <td>
                    <label>
                        <input type="radio" name="status" id="status" value="3" required>
                       Divorce(e)
                    </label>
                </td>
                <td>
                    <label>
                        <input type="radio" name="status" id="status" value="4" required>
                        Veuf(ve)
                    </label>
                </td>
            </tr>
        </table>
    </fieldset>
</div>  
</div>




<!-- Dob Field -->
<div class="col-md-12">
<div class="form-group">
    <div class="input-group">
        <label>Date de naissance</label>
        <div class="form-group-addon">
            <i class="fa fa-calendar teacherdob"></i>
        </div>
        <input type="text"
             name="dob"
             id="dob"
              class="form-control text-capitalize"
              placeholder="YY-MM-DD"
              value="{{$teacher->dob}}"
              >
    </div>
</div>

</div>

<div class="form-group col-sm-12">
    <label>Religion</label>
    {{-- {!! Form::label('start_time', 'Start time:') !!} --}}
    <input type="text" autocomplete="off" class="form-control" name="religion" id="religion"  value="{{$teacher->religion}}" required >
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-12">
    <select class="form-control" name="options" id="options"  required>
        <option  disabled="true" selected="false" value="">Option</option>
        <option value="Jardinière" @if ($teacher->options =='Jardinière') selected="true" @endif>Jardinière</option>
        <option value="Aide-Jardinière" @if ($teacher->options =='Aide-Jardinière') selected="true" @endif>Aide-Jardinière</option>
        <option value="Fondamental" @if ($teacher->options =='Fondamental') selected="true" @endif>Fondamental</option>
        <option value="Directrice pédagogique" @if ($teacher->options =='Directrice pédagogique') selected="true" @endif>Directrice pédagogique</option>
    </select>
</div>



<!-- Phone Field -->
<div class="form-group col-sm-12">
    <label>Telephone</label>
<input type="text" 
    name="phone"
    id="phone" 
    class="form-control text-capitalize"
    placeholder="Enter phone here"
    value="{{$teacher->phone}}"
    >
</div>


<!-- Email Field -->
<div class="form-group col-sm-12">
    <label>Email</label>
<input type="text" 
    name="email"
    id="email" 
    class="form-control text-capitalize"
    placeholder="Enter email here"
    value="{{$teacher->email}}"
    required
    >
</div>

<!-- Image Field -->
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="from-group form-group-login">
    <table style="margin:0 auto;">
        <thead>
            <tr class="info"></tr>
        </thead>
        <tbody>
            <tr>
                <td class="image" >
                    {!!Html::image('teacher_images/'.$teacher->image,
                    null,
                    ['class'=>'student.image', 'id'=>'showImage' , 'style'=>'width:200px; height:200px;'])!!}                       
                    <input type="file" name="image" id="image"
                    accept="image/x-png, image/png,image/jpg,image/jpeg"
                    >
                </td>
            </tr>
            <tr>
                <td style="text-align: center; background:#ddd;">
                    <input type="button"
                     name="browse_file"
                      id="browse_file"
                      class="form-control texte-capitalize btn-browse"
                      class="btn btn-outline-danger" value="Choose">
                </td>
            </tr>
        </tbody>
    </table>

</div>
</div>

<!-- Adress Field -->
<div class="form-group col-sm-12">
<b><i class="fa fa-map-marker"></i>Adresse</b>
    
        <textarea placeholder="Entrer adresse"
        name="adress"
        id="adress"
        cols="40" rows="2"
        class="form-control text-capitalize"
       >
       {{$teacher->adress}}
        </textarea>
  

</div>


                </div>
                    <div class="modal-footer">
                        {!! Form::submit('Modifier professeur', ['class' => 'btn btn-info']) !!}
                    </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection



@push('scripts')

<script type="text/javascript">
  $('#dob').datetimepicker({
       format:'YYYY-MM-DD',
       useCurrent: false
   })

$('#showImage').on('click', function(){
    // alert('okokokok')
})
   $('#browse_file').on('click', function(){
       $('#image').click();
       
   })
   $('#image').on('change', function(e){
       showFile(this, '#showImage');
   })

   function showFile(fileInput,img, showName){
       if(fileInput.files[0]){
       
           var reader = new FileReader();
           reader.onload = function(e){
               $(img).attr('src', e.target.result);
           }
           reader.readAsDataURL(fileInput.files[0]);
          
       }
       $(showName).text(fileInput.files[0].name)
    //    alert(fileInput.files[0].name)
   };
</script>


    
@endpush