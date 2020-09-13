

              <!-- Modal -->
  <div class="modal fade" id="add-admission-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" 
    style="width:90%"
    role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Ajouter un nouvel étudiant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            {{-- AUTO GENERATED USERNAME AND PASSWORD --}}
        {{-- <input type="text" name="username" id="username" value="{{  $rand_username_password }}">
        <input type="text" name="password" id="password" value="{{  $rand_username_password }}" > --}}
        {{-- <input type="text" name="student_id" id="student_id" value="{{ $student_id}}" > --}}
            

            <input type="hidden" name="user_id" id="user_id" 
            value="{{Auth::id()}}" required>
<!-- First Name Field -->
<div class="form-group col-sm-4">
    <label>Prénom*</label>
    <input type="text" 
        name="first_name"
        id="first_name" 
        class="form-control text-capitalize"
        placeholder="Prenom"
        required
        >
</div>


<!-- Last fater name Field -->
<div class="form-group col-sm-4">
    <label>Nom*</label>
    <input type="text" 
        name="last_name"
        id="last_name" 
        class="form-control text-capitalize"
        placeholder="Nom"
        required
        >
</div>

<!-- Class Id Field -->
<div class="form-group col-sm-4">
    <label>Classe*</label>
    <select class="form-control" name="class_id" id="class_id" required>
        <option value="0" selected="true" disabled="true">Choisir classe</option>
        @foreach($allClasses as $class)
        <option value="{{$class->class_id}}">{{$class->class_name}}</option>
        @endforeach
    </select>
</div>

<!-- email phone Field -->
<div class="form-group col-sm-4">
    <label>Email*</label>
    <input type="email" 
        name="email"
        id="email" 
        class="form-control "
        placeholder="Email"
        required
        >
</div>
<!-- Phone Field -->
<div class="form-group col-sm-4">
    <label> Téléphone de l'élève</label>
    <input type="text" 
        name="phone"
        id="phone" 
        class="form-control "
        placeholder="Téléphone"
        >
</div>

<!-- fathter Name Field -->
<div class="form-group col-sm-4">
    <label>Nom du père</label>
    <input type="text" 
        name="father_name"
        id="father_name" 
        class="form-control "
        placeholder="Nom du pere"
        
        >
</div>

<!-- father phone Field -->
<div class="form-group col-sm-4">
    <label>Téléphone du père</label>
    <input type="text" 
        name="father_phone"
        id="father_phone" 
        class="form-control text-capitalize"
        placeholder="Téléphone du pere"
        >
</div>

<!-- mother Name Field -->
<div class="form-group col-sm-4">
    <label>Nom de la mère*</label>
    <input type="text" 
        name="mother_name"
        id="mother_name" 
        class="form-control text-capitalize"
        placeholder="Nom de la mere"
        required
        >
</div>
<!-- mother phone Field -->
<div class="form-group col-sm-4">
    <label>Téléphone de la mère</label>
    <input type="text" 
        name="mother_phone"
        id="mother_phone" 
        class="form-control text-capitalize"
        placeholder="Téléphone de la mere"
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
        >
</div>


<!-- Gender Field -->
<div class="col-sm-4">
    <div class="form-group ">
        <fieldset>
            <legend for="gender">Sexe de l'élève*</legend>
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

<!-- Dob Field -->
<div class="col-md-4">
            <label> Date de naissance*</label>
            <input type="text"
                 name="dob"
                 id="dob"
                  class="form-control text-capitalize"
                  placeholder="Date de naissance"
                  autocomplete="off"
                  required
                  >
</div>

 


<div class="form-group col-sm-4">
    <label>Religion*</label>
    <input type="text" autocomplete="off" class="form-control" name="religion" id="religion" required >
</div>

<!-- Adress Field -->
<div class="form-group col-sm-4">
    <b><i class="fa fa-map-marker"></i>Adresse</b>
             <textarea placeholder="Entrer votre adresse ici"
             name="adress"
             id="adress"
             cols="40" rows="2"
             class="form-control text-capitalize">
             </textarea>
 </div>
    
 
{{-- <!-- departement_id Field -->
<div class="form-group col-sm-4">
    <label> Département</label>
    <select class="form-control" name="departement_id" id="departement_id">
        <option value="0" selected="true"
            disabled="true">Département</option>
            @foreach ($departements as $dep)
                 <option value="{{$dep->departement_id}}">{{$dep->departement_name}}</option>
            @endforeach
          
    </select>
   
</div> --}}



<!-- Image Field -->
<div class="col-lg-12 col-md-12 col-sm-4">
    <div class="from-group form-group-login">
        <table style="margin:0 auto;">
            <thead>
                <tr class="info"></tr>
            </thead>
            <tbody>
                <tr>
                    <td class="image" >
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



<div class="modal-footer ">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
  {!! Form::submit('Enregistrer étudiant', ['class' => 'btn btn-primary']) !!}
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

     
 @endpush