@extends('layouts.app')
<style>
    input[readonly], textarea{
        background: white !important;
        border: none;
      
    }
</style>
@section('content')
    <section class="content-header">
        <h1>
          @if(Auth::user()->role == 1)
          Administrateur
         @elseif(Auth::user()->role == 2)
          Professeur
         @elseif(Auth::user()->role == 3)
         Etudiant
         @endif
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
              
  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        Profil de l'utilisateur
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Profile de l'utilisateur</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" 
              

            @if (Auth::user()->role !=1)
           src="{{asset('user_images/'.Auth::user()->GetUser(Auth::user()->role,Auth::user()->id)->image)}}" 
              @else
           src="{{asset('user_images/defaultAvatar.png')}}" 
          
            @endif
         
            width="50" height="50"
            style="border-radius: 50%;
            width:150px; height:150px;
            vertical-align:middle;"
            alt="User profile picture">

            <h3 class="profile-username text-center">{{$user->first_name}} {{$user->last_name}}</h3>
            @if (Auth::user()->role == 1)
            <h3 class="profile-username text-center">{{$user->name}}</h3>
            @endif

              <p class="text-muted text-center">
               @if(Auth::user()->role == 1)
                Administrateur
               @elseif(Auth::user()->role == 2)
                Professeur(e)
               @elseif(Auth::user()->role == 3)
               Etudiant(e)
               @endif
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Email</b> <a class="pull-right">{{$user->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Telephone</b> <a class="pull-right">{{$user->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Membre depuis</b> <a class="pull-right"> 
    {{ date('Y')-$user->created_at->format('Y') }}
                    ans
                     </a>
                </li>
              </ul>

              <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b>Plus</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">A propos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i>Status matrimonial</strong>

              <p class="text-muted">
                @if ($user->statusmatrimonial==0)
                Célibataire
                    @elseif($user->statusmatrimonial==1)
                     Fiancé(e) 
                    @elseif($user->statusmatrimonial==2)
                     Marié(e)  
                    @elseif($user->statusmatrimonial==3)
                     Divorcé(e)  
                    @elseif($user->statusmatrimonial==4)
                     Veuf(ve) 
                    @endif
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

              <p class="text-muted">{{$user->adress}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Identifiant</strong>

              <p><br>
                <span class="label label-success">{{Auth::user()->id}}</span>
                

              <hr>

              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date de naissance</strong>

            <p>{{$user->dob->format('Y M D')}}</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Cours</a></li>
              <li><a href="#timeline" data-toggle="tab">Details</a></li>
              <li><a href="#settings" data-toggle="tab">Reglages</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <section class="content-header">
                  <h1>Mes cours</h1>
              </section>
              <div class="content">
                  @include('adminlte-templates::common.errors')
                  <div class="box box-primary">
                      <div class="box-body"><br><br>
                         @if (Auth::user()->role != 3)
                         
                        <div class="container">
                          <div class="row">
                            <div class="col-md-8">
                                  @foreach ($schedules as $schedule)
                                    <div  class="btn  col-md-12" >
                                      <div style="background-color: rgb(172, 172, 172); border-radius:25px;" >
                                        <i class="fa fa-book"></i> {{$schedule->InfoCourse->course_name}} <br>en 
                                        <b style="color: red">{{$schedule->InfoClass->class_name}}</b>
                                        <hr>
                                      </div>
                                    </div>
                                  @endforeach
                            </div>
                          </div>
                    </div>
                             
                         @elseif(Auth::user()->role == 3)
                             
                         <div class="container">
                          <div class="row">
                            <div class="col-md-8">
                                  @foreach ($cours as $schedule)
                                    @if($schedule->InfoCourse->course_id == Auth::user()->GetUser(Auth::user()->role,Auth::user()->id)->class_id)
                                    <div  class="btn  col-md-12" >
                                      <div style="background-color: rgb(172, 172, 172); border-radius:25px;" >
                                        <i class="fa fa-book"></i> {{$schedule->InfoCourse->course_name}} <br>en 
                                        <b style="color: red">{{$schedule->InfoClass->class_name}}</b>
                                        <hr>
                                      </div>
                                    </div>
                                    @endif
                                  @endforeach
                            </div>
                          </div>
                    </div>
                         @endif
                      </div>
                    </div>
               </div>
              </div>
              <div class="tab-pane" id="settings">
                  <section class="content-header">
                    <h1>
                        Changer mot de passe
                    </h1>
                </section>
                <div class="content">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body"><br><br>

                        <form action="{{url('/userUpdatePassword')}}"
                        method="post"
                        class="form-horizontal">
                        @csrf
                  <div class="form-group">
                  <input type="hidden" name="email" id="" 
                  value="{{$user->email}}"
                  >
                  <input type="hidden" name="user_id" id="" 
                  value="{{Auth::user()->id}}"
                  >
                  <input type="hidden" name="user_role" id="" 
                  value="{{Auth::user()->role}}"
                  >
                    <label for="inputName" class="col-sm-2 control-label">Ancien mot de passe</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="old_password" id="oldpassword" placeholder="Entrer ancien mot de passe">
                      <i class="input-icon" id="messageError"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Nouveau mot de passe</label>

                    <div class="col-sm-10">
                      <input type="text " class="form-control" name="new_password"id="newpassword" placeholder="Entrer nouveau mot de passe">
                    </div>
                  </div>
         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Changer mot de passe</button>
                    </div>
                  </div>
                </form>
                </div>
                </div>
            </div>
        </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                {{-- ALL THE DETAILS ABOUT THE student --}}
                    <section class="content-header">
                      <h1>
                         Profile
                      </h1>
                  </section>
                  <div class="content">
                      @include('adminlte-templates::common.errors')
                      <div class="box box-primary">
                          <div class="box-body"><br><br>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName"
                                class="col-sm-3 control-label">Nom complet</label>
                                <div class="col-sm-9">
                                    <input type="email"
                                        class="form-control"
                                        id="inputName"
                                        @if(Auth::user()->role == 1)
                                        value="{{$user->name}} "
                                       Etudiant
                                       @endif
                                        value="{{$user->first_name}} {{$user->last_name}}"
                                readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName"
                                    class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email"
                                            class="form-control"
                                            id="inputName"
                                            value="{{$user->email}}"
                                    readonly>
                                    </div>
                                </div>
                                

                                <div class="form-group ">
                                    
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Sexe</label>
                                      <div class="col-sm-9 ">
                                        <input type="email"
                                        class="form-control"
                                        id="inputName"
                                        @if ($user->gender==0)
                                        value="Masculin"  
                                            @else
                                            value="Féminin"  
                                            @endif
                                        
                                readonly>
                                            
                                      </div>
                                  
                                </div>

                                <div class="form-group ">
                                
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Status matrimonial</label>
                                      <div class="col-sm-9">
                                        <input type="email"
                                        class="form-control"
                                        id="inputName"
                                        @if ($user->statusmatrimonial==0)
                                        value="Célibataire"  
                                            @elseif($user->statusmatrimonial==1)
                                            value=" Fiancé(e)"  
                                            @elseif($user->statusmatrimonial==2)
                                            value=" Marié(e)"  
                                            @elseif($user->statusmatrimonial==3)
                                            value=" Divorcé(e)"  
                                            @elseif($user->statusmatrimonial==4)
                                            value=" Veuf(ve)"  
                                            @endif
                                        
                                readonly>
                                            
                                      </div>
                                  
                                </div>

                                <div class="form-group">
                                    <label for="inputName"
                                        class="col-sm-3 control-label">Date de naissance</label>
                                        <div class="col-sm-9">
                                            <input type="email"
                                                class="form-control"
                                                id="inputName"
                                                value="{{$user->dob->format('Y M D')}}"
                                        readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName"
                                            class="col-sm-3 control-label">Telephone</label>
                                            <div class="col-sm-9">
                                                <input type="email"
                                                    class="form-control"
                                                    id="inputName"
                                                    value="{{$user->phone}}"
                                            readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName"
                                                class="col-sm-3 control-label">Adresse</label>
                                                <div class="col-sm-9">
                                                    <input 
                                                        class="form-control"
                                                        id="inputExperience"
                                                        readonly
                                                        value="{{$user->adress}}"
                                                        >
                                                  
                                                   
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName"
                                                    class="col-sm-3 control-label">Date d'enregistrement</label>
                                                    <div class="col-sm-9">
                                                        <input type="email"
                                                            class="form-control"
                                                            id="inputName"
                                                            value="{{date("Y-m-d"),
                                                        strtotime($user->dateRegistered)}}"
                                                    readonly>
                                                    </div>
                                                </div>

                        </div>

                </form>
              </div>
            </div>
          </div>
        </div>
              <!-- /.tab-pane -->

             
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            {{-- </div> --}}
        </div>
    </div>
@endsection

{{-- @section('scripts')
   <script>
      $(document).ready(function(){

        $('#oldpassword').keyup(function(){
          //using keyup to check if data is valid or not
          var old_password = $('#oldpassword').val();
          // alert(old_password);
          $.ajax({
            type:'get',
            url: '/verify-password',
            data: {old_password:old_password},
            success : function(response){
              if(response == 'false'){
                //show error
                $("#messageError").html("<font color='red'> <b> Password Incorect</b> </font>")
              }else if(response == 'true'){
                //show success msg
                $("#messageError").html("<font color='green'> <b>Password corect</b> </font>")
              }
            }
          });
        });
      });
  </script> 
@endsection --}}
