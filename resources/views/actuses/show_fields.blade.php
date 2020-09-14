{{-- <!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $actus->created_by }}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{{ $actus->title }}</p>
</div>

<!-- Body Field -->
<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    <p>{{ $actus->body }}</p>
</div> --}}


<div class="col-md-12">
          
    <div class="col-md-12">
   
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
            <hr>

        
            <div class="user-block">
                @if ($actus->GetUser($actus->created_by)->image)
                <img class="img-circle" src="{{asset('user_images/'.$actus->GetUser($actus->created_by)->image)}}" alt="User Image">
                @else
                <img class="img-circle" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
                @endif
           <span class="username"><a href="#">{{$actus->GetUser($actus->created_by)->first_name}} {{$actus->GetUser($actus->created_by)->last_name}}</a></span>
            <span class="description">Publie le {{$actus->created_at->format('D M. Y')}} a {{$actus->created_at->format('h:m')}}</span>
            </div>

            <div class="box-body">
              <!-- post text -->
               <p>{{$actus->body}}</p>
            </div>

              <!-- /.box-comment -->

          </div>
          
            <!-- /.box-tools -->
          </div>
          </div>
</div>
