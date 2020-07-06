@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Admission
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
            value="{{Auth::id()}}" required>
<!-- First Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="first_name"
        id="first_name" 
        class="form-control text-capitalize"
        placeholder="Enter first name here"
        value="{{$admission->first_name}}"
        >
</div>


<!-- Last fater name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Enter first name here"
        value="{{$admission->last_name}}"
        >
</div>

<!-- email phone Field -->
<div class="form-group col-sm-12">
    <input type="email" 
        name="email"
        id="email" 
        class="form-control text-capitalize"
        placeholder="Enter the email  here"
        value="{{$admission->email}}"
        >
</div>


<!-- fathter Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="father_name"
        id="father_name" 
        class="form-control text-capitalize"
        placeholder="Enter the father name here"
        value="{{$admission->father_name}}"
        >
</div>

<!-- father phone Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="father_phone"
        id="father_phone" 
        class="form-control text-capitalize"
        placeholder="Enter the father phone here"
        value="{{$admission->father_phone}}"
        >
</div>

<!-- mother Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="mother_name"
        id="mother_name" 
        class="form-control text-capitalize"
        placeholder="Enter the mother name here"
        value="{{$admission->mother_name}}"
        >
</div>
<!-- mother phone Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="mother_phone"
        id="mother_phone" 
        class="form-control text-capitalize"
        placeholder="Enter the mother phone here"
        value="{{$admission->mother_phone}}"
        >
</div>

<!-- Gender Field -->
<div class="col-sm-12">
    <div class="form-group ">
        <fieldset>
            <legend for="gender">Gender</legend>
            <table style="width: 100%; margin-top:14px;">
                <tr style="border-bottom: 1px solid #ccc">
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="0"
                            {{$admission->gender ==0 ? 'checked' :''}}  >
                            
                            Male
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="1"
                            {{$admission->gender ==1 ? 'checked' :''}} >
                            
                               Female
                        </label>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>  
 </div>

 <!-- Status Field -->
{{-- <div class="col-sm-12">
    <div class="form-group ">
        <fieldset>
            <legend for="gender">Status</legend>
            <table style="width: 100%; margin-top:14px;">
                <tr style="border-bottom: 1px solod #ccc">
                    <td>
                        <label>
                            <input type="radio" name="status" id="status" value="0" required checked>
                            Single
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="status" id="status" value="1" required>
                            Maried
                        </label>
                    </td>
                </tr>
            </table>
        </fieldset>
    </div>  
 </div> --}}
   



<!-- Dob Field -->
<div class="col-md-12">
    <div class="form-group">
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
                  >
        </div>
    </div>

</div>



@push('scripts')
    {{-- <script type="text/javascript">
        $('#dobb').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script> --}}
@endpush



 
<!-- Phone Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="phone"
        id="phone" 
        class="form-control text-capitalize"
        value="{{$admission->phone}}"
        >
</div>

<!-- departement_id Field -->
<div class="form-group col-sm-12">
    <select class="form-control" name="departement_id" id="departement_id">
        <option value="0" selected="true"
            disabled="true">Choose Departement</option>
            @foreach ($departements as $dep)
                 <option value="{{$dep->departement_id}}"
                    {{$dep->departement_id == $admission->departement_id ? 'selected' : ''}}
                    >{{$dep->departement_name}}</option>
            @endforeach
          
    </select>
   
</div>

<!-- Batch Field -->
<div class="form-group col-sm-12">
    <select class="form-control" name="batch_id" id="batch_id">
        <option value="0" selected="true"
            disabled="true">Choose Batch </option>
            @foreach ($batches as $batch)
                 <option value="{{$batch->batch_id}}"
                    {{$batch->batch_id === $admission->batch_id ? 'selected' : ''}}>
                    {{$batch->batch}} </option>
            @endforeach
          
    </select>
   
</div>

<!-- Faculty Field -->
<div class="form-group col-sm-12">
    <select class="form-control" name="faculty_id" id="faculty_id">
        <option value="0" selected="true"
            disabled="true">Choose Faculty</option>
            @foreach ($faculties as $fac)
                 <option value="{{$fac->faculty_id}}"
                    {{$fac->faculty_id == $admission->faculty_id ? 'selected' : ''}}
                    >{{$fac->faculty_name}}</option>
            @endforeach
          
    </select>
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
                        {!!Html::image('student_images/'.$admission->image,
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
   <b><i class="fa fa-map-marker"></i>Address</b>
        
            <textarea placeholder="Enter address here"
            name="adress"
            id="adress"
            cols="40" rows="2"
            class="form-control text-capitalize"
           >{{$admission->adress}}
            </textarea>
      
    
</div>
   

{{-- <!-- Dateregistered Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dateRegistered', 'Dateregistered:') !!}
    {!! Form::text('dateRegistered', null, ['class' => 'form-control','id'=>'dateRegistered']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#dateRegistered').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush --}}

{{-- <!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div> --}}


</div>
<div class="modal-footer ">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Update Admission', ['class' => 'btn btn-primary']) !!}
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