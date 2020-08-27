@extends('layouts.app')

@section('content')
<div class="container">
   <br>
   

   @include('flash::message')
   @include('adminlte-templates::common.errors')

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$totalStudents}}</h3>
                            <p>Total Elèves</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$totalTeachers}}</h3>
                            <p>Total Professeurs</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                        <h3>{{$totalCourses}}</h3>
                            <p>Total Cours</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

    </div>
<br><br>

        <div class="content">
             <!-- /.col -->
      <div class="row">
        <div class="col-md-8">
            <!-- Application buttons -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Institution Frère André : Access rapide</h3>
              </div>
              <div class="box-body">
                    <p><code>Institution Frère André _ Foyer Eveil</code> I.F.A</p>
                 
                         {{-- EVERYBODY CAN ACCESS --}}
                  <a class="btn btn-app col-md-2" href="{{ url('/home') }}">
                  <i class="fa fa-home"></i> Accueil
                  </a>
                  <a class="btn btn-app col-md-2" href="{{ route('matieres.index') }}">
                    <i class="fa fa-book"></i> Matières
                    </a>
                  <a class="btn btn-app col-md-2" href="{{ route('actuses.index') }}">
                    <i class="fa fa-tags"></i> Publications
                    </a>
                 
                    <a class="btn btn-app col-md-2" href="{{ route('classSchedulings.index') }}">
                    <i class="fa fa-calendar"></i> Horaire
                    </a>
                    
                    
                  
                    <a class="btn btn-app col-md-2" href="{{ url('/profile/'.Auth::user()->id)}}">
                      <i class="fa fa-user-circle"></i> Mon profil
                    </a>
                    <a class="btn btn-app col-md-2" href="{{ route('exams.index') }}">
                      <span class="badge bg-red">{{$totalExamens}}</span>
                      <i class="fa fa-book"></i> Examens
                    </a>

                    <a class="btn btn-app col-md-2" href="{{ route('soumissions.index') }}">
                      <i class="fa fa-book"></i> Soumissions
                    </a>
              {{-- END EVERYBODY CAN ACCESS --}}
                        {{-- ONLY ADM CAN ACCESS --}}
                        @if (Auth::user()->role==1)
                        <a class="btn btn-app col-md-2 "href="{{ route('classes.index') }}">
                          <span class="badge bg-teal">{{$totalClasses}}</span>
                          <i class="fa fa-graduation-cap"></i> Classes
                          </a>
                          {{-- <a class="btn btn-app col-md-2" href="{{ route('levels.index') }}">
                            <i class="fa fa-bar-chart-o"></i> Niveaux
                            </a> --}}
                            <a class="btn btn-app col-md-2" href="{{ route('annees.index') }}">
                              <i class="fa fa-calendar-times-o"></i> Années
                              </a>
                            <a class="btn btn-app col-md-2" href="{{ route('semesters.index') }}">
                            <i class="fa fa-calendar-times-o"></i> Etapes
                            </a>
                              <a class="btn btn-app col-md-2" href="{{ route('departements.index') }}">
                              <span class="badge bg-yellow">{{$totalDepartements}}</span>
                              <i class="fa fa-code-fork"></i> Départements
                              </a>
                              {{-- <a class="btn btn-app col-md-2" href="{{ route('academics.index') }}">
                              <span class="badge bg-green">300</span>
                              <i class="fa  fa-clock-o"></i> Annee Academique
                              </a> --}}
                              <a class="btn btn-app col-md-2" href="{{ route('roles.index') }}">
                                <span class="badge bg-green">{{$totalRoles}}</span>
                                <i class="fa  fa-user-secret"></i> Roles
                                </a>

                                <a class="btn btn-app col-md-2" href="{{ route('teachers.index') }}">
                                  <span class="badge bg-green">{{$totalTeachers}}</span>
                                  <i class="fa fa-user-circle"></i> Professeurs
                                  </a>

                                <a class="btn btn-app col-md-2" href="{{ route('users.index') }}">
                                <span class="badge bg-red">{{$totalUsers}}</span>
                                  <i class="fa fa-group"></i> Utilisateurs
                                </a>
                        @endif
                        {{-- END ONLY ADM CAN ACCESS --}}
                    
                  
            {{-- ONLY ADM AND TEACHERS CAN ACCESS --}}
             @if (Auth::user()->role < 3)
             <a class="btn btn-app col-md-2" href="{{ route('classAssignings.index') }}">
              <i class="fa fa-exchange"></i> Assignations
              </a>
              <a class="btn btn-app col-md-2" href="{{ route('admissions.index') }}">
                <span class="badge bg-aqua">{{$totalStudents}}</span>
                <i class="fa fa-user"></i> Elèves
                </a>
             @endif
             {{-- END ONLY ADM AND TEACHERS CAN ACCESS --}}
                  
            
             </div>
            </div>
        </div>
        
        <div class="col-md-4">
          
            <div class="col-md-12">
           
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <a class="box-title"  href="{{ route('actuses.index') }}">Actualités</a>
                    <hr>
                    <?php $countActu = 0; ?>
                    @foreach ($allActus as $actu)
                    <?php if($countActu == 2) break; ?>
                    <div class="user-block">
                      @if ($actu->GetUser($actu->created_by)->image)
                      <img class="img-circle" src="{{asset('user_images/'.$actu->GetUser($actu->created_by)->image)}}" alt="User Image">
                     @else
                     <img class="img-circle" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
                   
                      @endif
                    <span class="username">
                      <a href="#">
                      {{$actu->GetUser($actu->created_by)->first_name}}
                       {{$actu->GetUser($actu->created_by)->last_name}}
                      </a>
                    </span>
                    <span class="description">Publie le {{$actu->created_at->format('D M. Y')}} a {{$actu->created_at->format('h:m')}}</span>
                    </div>

                    <div class="box-body">
                      <!-- post text -->
                       <p>{{$actu->body}}</p>
                       <a href="{{ route('actuses.show', [$actu->actu_id]) }}" >Plus</a>
                       
                    </div>
                    <?php $count = 0; ?>
                 @foreach ($actu->AllComments as $comment)
                 <?php if($count == 2) break; ?>
                    <div class="box-footer box-comments">
                      <div class="box-comment">
                        <!-- User image -->
                        {{-- si comment la te creer par yon adm --}}
                        @if ($comment->GetUser($comment->created_by)->role ==1)
                        <img class="img-circle img-sm" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
                       
                        @else
                        <img class="img-circle img-sm" src="{{asset('user_images/'.$comment->GetUser($comment->created_by)->image)}}" alt="User Image">
                     
                        @endif
                        
                        <div class="comment-text">
                          <span class="username">
                            <a href="#">
                               {{ $comment->GetUser($comment->created_by)->first_name}} {{ $comment->GetUser($comment->created_by)->last_name}}
                            </a>
                           </span>
                        </div>
                        <span class="text-muted pull-right">{{$comment->created_at->format('d M. Y')}} a {{$comment->created_at->format('h:m')}}</span>
       
                       {{ $comment->body}} 

                       @if ($comment->created_by == Auth::user()->id  || Auth::user()->role ==1 )
                        {!! Form::open(['route' => ['comments.destroy', $comment->id_comment], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('comments.edit', [$comment->id_comment]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn  btn-xs', 'onclick' => "return confirm('Etes-vous sur ?')"]) !!}
                        </div>
                        {!! Form::close() !!} 
                       @endif
                      
                       
                        <hr>
                      
                        <!-- /.comment-text -->
                      </div>
                    </div>
                    
                    <?php $count++; ?>
                    @endforeach
                      <!-- /.box-comment -->
                    
                      <div class="box-footer">
                       
                          @if (Auth::user()->role !=1)
                          <img src="{{asset('user_images/'.Auth::user()->GetUser(Auth::user()->role ,Auth::user()->id )->image)}}" class="img-responsive img-circle img-sm" alt="User Image">
                         @else
                          <img src="{{asset('user_images/defaultAvatar.png')}}" class="img-responsive img-circle img-sm"
                          alt="User Image">
                          @endif
                          <!-- .img-push is used to add margin to elements next to floating images -->
                          <form 
                           action="{{route('comments.store')}}" method="post"                       
                            >
                             @csrf
                          <input type="hidden" name="created_by" id="created_by" 
                            value="{{Auth::id()}}" required>
                            <input type="hidden" name="actu_id" id="actu_id" 
                            value="{{$actu->actu_id}}" required>
                          <div class="input-group">
                            <input type="text" class="form-control input-sm" name="body" id="body" placeholder="Entrez votre commentaire" required>
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-primary btn-flat">Publier</button>
                            </span>
                          </div>
                        </form>
                      </div>
                      <!-- /.box-footer -->
                      <hr>
                      <?php $countActu++; ?>
                    @endforeach
                   
                    <!-- /.user-block -->
                  
                    <!-- /.box-tools -->
                  </div>
                  </div>
        </div>




              


              <!-- /.box-body -->
            </div>
              
            











          </div>
      
</div>
@endsection
