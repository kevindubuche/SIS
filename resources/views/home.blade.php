@extends('layouts.app')

@section('content')
<div class="container">
   <br>


        <div class="col-md-4">
            <div class="row">
                <div class="col-lg-10 col-xs-10">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Etudiants</p>
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
                            <h3>79</h3>
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
                            <h3>123</h3>
                            <p>Total Cours</p>
                        </div>
                    </div>
                </div>
          </div>
        </div>

    </div>
<br><br>

        <div class="container">
             <!-- /.col -->
      <div class="row">
        <div class="col-md-8">
            <!-- Application buttons -->
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Faculte Des Sciences : Access rapide</h3>
              </div>
              <div class="box-body">
                    <p><code>La Faculte des Siences de L'Universite d'Etat d'Haiti</code> FDS-UEH </p>
                    <a class="btn btn-app">
                    <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn btn-app">
                    <i class="fa fa-play"></i> Play
                    </a>
                    <a class="btn btn-app">
                    <i class="fa fa-repeat"></i> Repeat
                    </a>
                    <a class="btn btn-app">
                    <i class="fa fa-pause"></i> Pause
                    </a>
                    <a class="btn btn-app">
                    <i class="fa fa-save"></i> Save
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-yellow">3</span>
                    <i class="fa fa-bullhorn"></i> Notifications
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-green">300</span>
                    <i class="fa fa-barcode"></i> Products
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-purple">891</span>
                    <i class="fa fa-users"></i> Users
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-teal">67</span>
                    <i class="fa fa-inbox"></i> Orders
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-aqua">12</span>
                    <i class="fa fa-envelope"></i> Inbox
                    </a>
                    <a class="btn btn-app">
                    <span class="badge bg-red">531</span>
                    <i class="fa fa-heart-o"></i> Likes
                    </a>
             </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="col-md-12">
                <!-- Box Comment -->
                <div class="box box-widget">
                  <div class="box-header with-border">
                    <div class="user-block">
                      <img class="img-circle" src="{{asset('teacher_images/defaultAvatar.png')}}" alt="User Image">
                      <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                      <span class="description">Shared publicly - 7:30 PM Today</span>
                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">
                      <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                        <i class="fa fa-circle-o"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <!-- post text -->
                    <p>Far far away, behind the word mountains, far from the
                      countries Vokalia and Consonantia, there live the blind
                      texts. Separated they live in Bookmarksgrove right at</p>
      
                    <p>the coast of the Semantics, a large language ocean.
                      A small river named Duden flows by their place and supplies
                      it with the necessary regelialia. It is a paradisematic
                      country, in which roasted parts of sentences fly into
                      your mouth.</p>
      
                   
      
                    <!-- Social sharing buttons -->
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">45 likes - 2 comments</span>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer box-comments">
                    <div class="box-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="{{asset('teacher_images/defaultAvatar.png')}}" alt="User Image">
      
                      <div class="comment-text">
                            <span class="username">
                              Maria Gonzales
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                        It is a long established fact that a reader will be distracted
                        by the readable content of a page when looking at its layout.
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                    <div class="box-comment">
                      <!-- User image -->
                      <img class="img-circle img-sm" src="{{asset('teacher_images/defaultAvatar.png')}}" alt="User Image">
      
                      <div class="comment-text">
                            <span class="username">
                              Nora Havisham
                              <span class="text-muted pull-right">8:03 PM Today</span>
                            </span><!-- /.username -->
                        The point of using Lorem Ipsum is that it has a more-or-less
                        normal distribution of letters, as opposed to using
                        'Content here, content here', making it look like readable English.
                      </div>
                      <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                  </div>
        </div>




              


              <!-- /.box-body -->
            </div>
              
            












      
</div>
@endsection
