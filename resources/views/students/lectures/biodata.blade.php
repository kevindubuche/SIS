@extends('layouts.frontLayout.app')
<style>
    input[readonly], textarea{
        background: white !important;
        border: none;
      
    }
</style>
@section('content')
    <section class="content-header">
        <h1>
            student
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
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
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
            src="{{asset('student_images/'.$student->image)}}" 
            width="50" height="50"
            style="border-radius: 50%;
            width:150px; height:150px;
            vertical-align:middle;"
            alt="User profile picture">

            <h3 class="profile-username text-center">{{$student->first_name}} {{$student->last_name}}</h3>

              <p class="text-muted text-center">student</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="pull-right">13,287</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">student Timetable</a></li>
              <li><a href="#timeline" data-toggle="tab">Full details</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <section class="content-header">
                  <h1>
                    Class time table
                  </h1>
              </section>
              <div class="content">
                  @include('adminlte-templates::common.errors')
                  <div class="box box-primary">
                      <div class="box-body"><br><br>
                         <h1>Class time table</h1>
                      </div>
                    </div>
               </div>
              </div>
              <div class="tab-pane" id="settings">
                  <section class="content-header">
                    <h1>
                        Change password
                    </h1>
                </section>
                <div class="content">
                    @include('adminlte-templates::common.errors')
                    <div class="box box-primary">
                        <div class="box-body"><br><br>

                        <form action="{{url('/student-update-password')}}"
                        method="post"
                        class="form-horizontal">
                        @csrf
                  <div class="form-group">
                  <input type="hidden" name="email" id="" value="{{$student->email}}">
                    <label for="inputName" class="col-sm-2 control-label">Old password</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="old_password" id="oldpassword" placeholder="Old password">
                      <i class="input-icon" id="messageError"></i>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">New password</label>

                    <div class="col-sm-10">
                      <input type="text " class="form-control" name="new_password"id="newpassword" placeholder="New password">
                    </div>
                  </div>
         
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-info">Update password</button>
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
                          Student Biodata / Profile
                      </h1>
                  </section>
                  <div class="content">
                      @include('adminlte-templates::common.errors')
                      <div class="box box-primary">
                          <div class="box-body"><br><br>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputName"
                                class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="email"
                                        class="form-control"
                                        id="inputName"
                                        value="{{$student->first_name}} {{$student->last_name}}"
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
                                            value="{{$student->email}}"
                                    readonly>
                                    </div>
                                </div>
                                

                                <div class="form-group ">
                                    
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Gender</label>
                                      <div class="col-sm-9 ">
                                            @if ($student->gender==0)
                                                <span>Male</span>
                                            @else
                                                <span>Female</span>
                                            @endif
                                      </div>
                                  
                                </div>

                                <div class="form-group ">
                                
                                        <label for="inputName"
                                        class="col-sm-3 control-label">Status</label>
                                      <div class="col-sm-9">
                                            @if ($student->gender==0)
                                                Single
                                            @else
                                                Maried
                                            @endif
                                      </div>
                                  
                                </div>

                                <div class="form-group">
                                    <label for="inputName"
                                        class="col-sm-3 control-label">Date of birth</label>
                                        <div class="col-sm-9">
                                            <input type="email"
                                                class="form-control"
                                                id="inputName"
                                                value="{{$student->dob}}"
                                        readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputName"
                                            class="col-sm-3 control-label">Phone</label>
                                            <div class="col-sm-9">
                                                <input type="email"
                                                    class="form-control"
                                                    id="inputName"
                                                    value="{{$student->phone}}"
                                            readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName"
                                                class="col-sm-3 control-label">Address</label>
                                                <div class="col-sm-9">
                                                    <textarea 
                                                        class="form-control"
                                                        id="inputExperience"
                                                        readonly>
                                                  {{$student->adress}}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputName"
                                                    class="col-sm-3 control-label">Register Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="email"
                                                            class="form-control"
                                                            id="inputName"
                                                            value="{{date("Y-m-d"),
                                                        strtotime($student->dateRegistered)}}"
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

@section('scripts')
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
@endsection
