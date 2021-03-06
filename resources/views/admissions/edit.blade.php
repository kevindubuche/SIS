@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Etudiant(e)
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                {!! Form::model($admission, ['route' => ['admissions.update', $admission->student_id], 'method' => 'patch',  'enctype'=>'multipart/form-data']) !!}

{{--   
                   <form action="{{route('admissions.update', $admission->student_id)}}"
                    method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') --}}
                        
            {{-- AUTO GENERATED USERNAME AND PASSWORD --}}
        {{-- <input type="text" name="username" id="username" value="{{  $rand_username_password }}">
        <input type="text" name="password" id="password" value="{{  $rand_username_password }}" > --}}
        {{-- <input type="text" name="student_id" id="student_id" value="{{ $student_id}}" > --}}
            

            <input type="hidden" name="user_id" id="user_id" 
            value="{{$admission->user_id}}" required>
<!-- First Name Field -->
<div class="form-group col-sm-12">
    <label>Prénom*</label>
    <input type="text" 
        name="first_name"
        id="first_name" 
        class="form-control text-capitalize"
        placeholder="Prenom"
        value="{{$admission->first_name}}"
        required
        >
</div>


<!-- Last fater name Field -->
<div class="form-group col-sm-12">
    <label>Nom*</label>
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Nom"
        value="{{$admission->last_name}}"
        required
        >
</div>

<!-- email phone Field -->
<div class="form-group col-sm-12">
    <label>Email*</label>
    <input type="email" 
        name="email"
        id="email" 
        class="form-control "
        placeholder="Email"
        value="{{$admission->email}}"
        required
        >
</div>


<!-- fathter Name Field -->
<div class="form-group col-sm-12">
    <label>Nom complet du père</label>
    <input type="text" 
        name="father_name"
        id="father_name" 
        class="form-control text-capitalize"
        placeholder="Nom complet du pere"
        value="{{$admission->father_name}}"
        >
</div>

<!-- father phone Field -->
<div class="form-group col-sm-12">
    <label>Téléphone du père</label>
    <input type="text" 
        name="father_phone"
        id="father_phone" 
        class="form-control text-capitalize"
        placeholder="Telephone du pere"
        value="{{$admission->father_phone}}"
        >
</div>

<!-- mother Name Field -->
<div class="form-group col-sm-12">
    <label>Nom complet de la mère*</label>
    <input type="text" 
        name="mother_name"
        id="mother_name" 
        class="form-control text-capitalize"
        placeholder="Nom complet de la mere"
        value="{{$admission->mother_name}}"
        required
        >
</div>
<!-- mother phone Field -->
<div class="form-group col-sm-12">
    <label>Téléphone de la mère</label>
    <input type="text" 
        name="mother_phone"
        id="mother_phone" 
        class="form-control text-capitalize"
        placeholder="Telephone de la mere"
        value="{{$admission->mother_phone}}"
        >
</div>

<!-- mother Name Field -->
<div class="form-group col-sm-4">
    <label>Autre personne reponsable (Nom)</label>
    <input type="text" 
        name="responsable_nom"
        id="responsable_nom" 
        class="form-control "
        placeholder="Nom de la mere"
        value="{{$admission->responsable_nom}}"
      
        >
</div>
<!-- mother phone Field -->
<div class="form-group col-sm-4">
    <label>Autre personne reponsable (Téléphone)</label>
    <input type="text" 
        name="responsable_phone"
        id="responsable_phone" 
        class="form-control "
        placeholder="Téléphone de la mere"
        value="{{$admission->responsable_phone}}"
        >
</div>


<!-- Gender Field -->
<div class="col-sm-12">
    <div class="form-group ">
        <fieldset>
            <legend for="gender">Sexe*</legend>
            <table style="width: 100%; margin-top:14px;">
                <tr style="border-bottom: 1px solid #ccc">
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="0"
                            {{$admission->gender ==0 ? 'checked' :''}}  >
                            
                            Masculin
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="1"
                            {{$admission->gender ==1 ? 'checked' :''}} >
                            
                               Féminin
                        </label>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>  
 </div>

 
 <div class="form-group col-sm-12">
    <label>Religion*</label>
    {{-- {!! Form::label('start_time', 'Start time:') !!} --}}
    <input type="text" autocomplete="off" class="form-control" name="religion" id="religion" value="{{$admission->religion}}" required >
</div>

<!-- Dob Field -->
<div class="col-md-12">
    <div class="form-group">
        <label>Date de naissance*</label>
        <div class="input-group">
            <div class="form-group-addon">
                <i class="fa fa-calendar teacherdob"></i>
            </div>
            <input type="text"
                 name="dob"
                 id="dob"
                  class="form-control text-capitalize"
                  placeholder="YY-MM-DD"
                  value="{{$admission->dob}}"
                  required
                  >
        </div>
    </div>

</div>

 
<!-- Phone Field -->
<div class="form-group col-sm-12">
    <label>Téléphone</label>
    <input type="text" 
        name="phone"
        id="phone" 
        class="form-control "
        value="{{$admission->phone}}"
        >
</div>

<!-- departement_id Field -->
<div class="form-group col-sm-12">
    <label>Classe*</label>
    <select class="form-control" name="class_id" id="class_id" required>
        <option value="0" selected="true"
            disabled="true">Classe</option>
            @foreach ($classes as $class)
                 <option value="{{$class->class_id}}"
                    {{$class->class_id == $admission->class_id ? 'selected' : ''}}
                    >{{$class->class_name}}</option>
            @endforeach
          
    </select>
   
</div>

<!-- departement_id Field -->
{{-- <div class="form-group col-sm-12">
    <label>Departement</label>
    <select class="form-control" name="departement_id" id="departement_id">
        <option value="0" selected="true"
            disabled="true">Departement</option>
            @foreach ($departements as $dep)
                 <option value="{{$dep->departement_id}}"
                    {{$dep->departement_id == $admission->departement_id ? 'selected' : ''}}
                    >{{$dep->departement_name}}</option>
            @endforeach
          
    </select>
   
</div> --}}



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
                        {!!Html::image('user_images/'.$admission->image,
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
        
            <textarea placeholder="Adresse"
            name="adress"
            id="adress"
            cols="40" rows="2"
            class="form-control text-capitalize"
           >{{$admission->adress}}
            </textarea>
      
    
</div>
   
</div>
<div class="modal-footer ">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Modifier etudiant', ['class' => 'btn btn-primary']) !!}
</div>


{{-- </form> --}}
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
   };
</script>


{{-- <script type="text/javascript">
  
$('#dobb').on('click', function(){
   console.log('pppppppppppppppppppppppppppppppppp')
})
   
   $('#dob').datepicker({
       changeMonth:true,
       changeYear:true,
       dateFormat:'yy-mm-dd'
   });

   

   
</script> --}}
    
@endpush