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

         @foreach ($actus->AllComments as $comment)
            <div class="box-footer box-comments">
              <div class="box-comment">
                <!-- User image -->
                {{-- si comment la te creer par yon adm --}}
                @if ($comment->GetUser($comment->created_by)->role ==1)
                <img class="img-circle img-sm" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
                <span class="username">
                  {{ $comment->GetUser($comment->created_by)->name}} 
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
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn  btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!} 
               @endif
              
               
                <hr>
              
                <!-- /.comment-text -->
              </div>
            </div>
            
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
                    value="{{$actus->actu_id}}" required>
                  <div class="input-group">
                    <input type="text" class="form-control input-sm" name="body" id="body" placeholder="Entrez votre commentaire" required>
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat">Publier</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer -->
           
           
            <!-- /.user-block -->
          
            <!-- /.box-tools -->
          </div>
          </div>
</div>
