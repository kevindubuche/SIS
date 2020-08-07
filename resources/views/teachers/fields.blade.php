  <!-- Modal -->
  <div class="modal fade" id="add-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouveau professeur</h5>
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
        placeholder="Prenom"
        >
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Nom"
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
                            <input type="radio" name="gender" id="gender" value="0">
                            Masculin
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="gender" id="gender" value="1">
                            Féminin
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
                            Célibataire
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="status" id="status" value="1" required>
                            Marié(e)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="status" id="status" value="1" required>
                            Divoré(e)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="status" id="status" value="1" required>
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
            <label> Date de naissance</label>
            <input type="text"
                 name="dob"
                 id="dob"
                  class="form-control text-capitalize"
                  placeholder="Date de naissance"
                  autocomplete="off"
                  >
        </div>
    </div>

</div>

<!-- Phone Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="phone"
        id="phone" 
        class="form-control text-capitalize"
        placeholder="Telephone"
        >
</div>


<!-- Email Field -->
<div class="form-group col-sm-12">
    <input type="text" 
        name="email"
        id="email" 
        class="form-control"
        placeholder="Email"
        required
        >
</div>
 {{-- <!-- Email Field -->
 <div class="form-group col-sm-12">
    {!! Form::label('religion', 'Religion:') !!}
    {!! Form::email('religion', null, ['class' => 'form-control', 'required']) !!}
</div> --}}
<div class="form-group col-sm-12">
    <label>Religion</label>
    {{-- {!! Form::label('start_time', 'Start time:') !!} --}}
    <input type="text" autocomplete="off" class="form-control" name="religion" id="religion" required >
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-12">
    <select class="form-control" name="options" id="options" required>
        <option  disabled="true" selected="false" value="">Option</option>
        <option value="Jardinière">Jardinière</option>
        <option value="Aide-Jardinière">Aide-Jardinière</option>
        <option value="Fondamental">Fondamental</option>
        <option value="Directrice pédagogique">Directrice pédagogique</option>
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
   <b><i class="fa fa-map-marker"></i>Adresse</b>
        
            <textarea placeholder="Entrer l'adresse"
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
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer professeur', ['class' => 'btn btn-primary']) !!}
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