  <!-- Modal -->
  <div class="modal fade" id="add-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <input type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}" required>
            <input type="hidden" name="dateRegistered" id="dateRegistered" 
            value="{{date('Y-m-d')}}">
<!-- First Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="first_name"
        id="first_name" 
        class="form-control text-capitalize"
        placeholder="Enter first name here"
        >
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Enter first name here"
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
                            <input type="radio" name="gender" id="gender" value="0">
                            Male
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="1">
                            Female
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
 </div>
   



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
        placeholder="Enter phone here"
        >
</div>


<!-- Email Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="email"
        id="email" 
        class="form-control text-capitalize"
        placeholder="Enter email here"
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
                        {!!Html::image('student_images/profile.png',
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
            class="form-control text-capitalize">
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
  {!! Form::submit('Register Teacher', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>
</div>

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