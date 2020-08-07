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
          Professeur
      
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
        <li class="active">Profil de l'utilisateur</li>
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
              

            @if ($teacher->image)
           src="{{asset('user_images/'.$teacher->image)}}" 
              @else
           src="{{asset('user_images/defaultAvatar.png')}}" 
          
            @endif
         
            width="50" height="50"
            style="border-radius: 50%;
            width:150px; height:150px;
            vertical-align:middle;"
            alt="User profile picture">

            <h3 class="profile-username text-center">{{$teacher->first_name}} {{$teacher->last_name}}</h3>
                       <p class="text-muted text-center">
             
                Professeur(e)
              
              </p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <b>Email</b> <a class="pull-right">{{$teacher->email}}</a>
                </li>
                <li class="list-group-item">
                  <b>Telephone</b> <a class="pull-right">{{$teacher->phone}}</a>
                </li>
                <li class="list-group-item">
                  <b>Membre depuis</b> <a class="pull-right"> 
    {{ date('Y')-$teacher->created_at->format('Y') }}
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
                @if ($teacher->status == 0)
                    Celibataire
                @elseif(($teacher->status == 1))
                    Fiance(e)
                @elseif(($teacher->status == 2))
                    Marie(e)
                @elseif(($teacher->status == 3))
                    Divorce(e)
                @elseif(($teacher->status == 4))
                    Veuf(ve)
                @endif
               
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

              <p class="text-muted">{{$teacher->adress}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Identifiant</strong>

              <p>
                <span class="label label-success">{{$teacher->user_id}}</span>
                

              <hr>

              <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date de naissance</strong>

            <p>{{$teacher->dob->format('d M. Y')}}</p>
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
              {{-- <li><a href="#settings" data-toggle="tab">Reglages</a></li> --}}
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <section class="content-header">
                  <h1>
                    Ses cours
                  </h1>
              </section>
              <div class="content">
                  @include('adminlte-templates::common.errors')
                  <div class="box box-primary">
                      <div class="box-body"><br><br>

                        <div class="container">
                          <div class="row">
                            <div class="col-md-8">
                            
                         @foreach ($schedules as $schedule)
                        <a class="btn btn-app col-md-2" href="#">
                        <i class="fa fa-book"></i> {{$schedule->InfoCourse->course_name}} en 
                        <b style="color: red">{{$schedule->InfoClass->class_name}}</b>
                        </a>
             
                         @endforeach
                  </div>
                </div>
           </div>
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
                         Profil
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
                                     
                                        value="{{$teacher->first_name}} {{$teacher->last_name}}"
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
                                            value="{{$teacher->email}}"
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
                                        @if ($teacher->gender==0)
                                        value="Masculin"  
                                            @else
                                            value="Feminin"  
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
                                        @if ($teacher->status == 0)
                                        value="Celibataire"
                                        @elseif(($teacher->status == 1))
                                        value="Fiance(e)"
                                        @elseif(($teacher->status == 2))
                                        value="Marie(e)"
                                        @elseif(($teacher->status == 3))
                                        value="Divorce(e)"
                                        @elseif(($teacher->status == 4))
                                        value="Veuf(ve)""
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
                                                value="{{$teacher->dob->format('d M. Y')}}"
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
                                                    value="{{$teacher->phone}}"
                                            readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName"
                                                class="col-sm-3 control-label">Religion</label>
                                                <div class="col-sm-9">
                                                    <input 
                                                        class="form-control"
                                                        id="inputExperience"
                                                        readonly
                                                        value="{{$teacher->religion}}"
                                                        >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                              <label for="inputName"
                                                  class="col-sm-3 control-label">Option</label>
                                                  <div class="col-sm-9">
                                                      <input 
                                                          class="form-control"
                                                          id="inputExperience"
                                                          readonly
                                                          value="{{$teacher->options}}"
                                                          >
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
                                                          value="{{$teacher->adress}}"
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
                                                        strtotime($teacher->dateRegistered)}}"
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
