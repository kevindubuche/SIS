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
    <label>Prénom</label>
    <input type="text" 
        name="first_name"
        id="first_name" 
        class="form-control text-capitalize"
        placeholder="Prenom"
        required
        >
</div>

<!-- Last Name Field -->
<div class="form-group col-sm-12">
    <label>Nom</label>
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Nom"
        required
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
            <legend for="statusmatrimonial">Status matrimonial</legend>
            <table style="width: 100%; margin-top:14px;">
                <tr style="border-bottom: 1px solod #ccc">
                    <td>
                        <label>
                            <input type="radio" name="statusmatrimonial" id="statusmatrimonial" value="0" required checked>
                            Célibataire
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="statusmatrimonial" id="statusmatrimonial" value="1" required checked>
                            Fiancé(e)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="statusmatrimonial" id="statusmatrimonial" value="2" required>
                            Marié(e)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="statusmatrimonial" id="statusmatrimonial" value="3" required>
                            Divoré(e)
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="radio" name="statusmatrimonial" id="statusmatrimonial" value="4" required>
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
                  required
                  >
        </div>
    </div>

</div>

<!-- Phone Field -->
<div class="form-group col-sm-12">
    <label> Téléphone</label>
    <input type="text" 
        name="phone"
        id="phone" 
        class="form-control text-capitalize"
        placeholder="Téléphone"
        required
        >
</div>


<!-- Email Field -->
<div class="form-group col-sm-12">
    <label>Email</label>
    <input type="text" 
        name="email"
        id="email" 
        class="form-control"
        placeholder="Email"
        required
        >
</div>

<div class="form-group col-sm-12">
    <label>NIF</label>
    <input type="text" autocomplete="off" class="form-control" name="nif" id="nif"  >
</div>

<div class="form-group col-sm-12">
    <label>Niveau académique</label>
    <input type="text" autocomplete="off" class="form-control" name="niveau" id="niveau"  >
</div>

<div class="form-group col-sm-12">
    <label>Religion</label>
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
                    <td class="image"  >
                        {!!Html::image('user_images/defaultAvatar.png',
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
                          class="btn btn-outline-danger" value="Choisir image">
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<!-- Adress Field -->
<div class="form-group col-sm-12">
   <b><i class="fa fa-map-marker"></i>Adresse</b>
        
            <textarea placeholder="Entrer votre adresse ici"
            name="adress"
            id="adress"
            cols="40" rows="2"
            class="form-control text-capitalize">
            </textarea>
      
    
</div>
   


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
        //leum klike sou youn mdeklanche sak kache a
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