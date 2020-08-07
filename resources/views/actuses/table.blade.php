
 <div class="col-md-12">
          
    <div class="col-md-12">
   
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class="box-header with-border">
            <h3 class="box-title">Publications</h3>
            <hr>

            @foreach ($actuses as $actu)
            <div class="user-block">
              @if ($actu->GetUser($actu->created_by)->image)
              <img class="img-circle" src="{{asset('user_images/'.$actu->GetUser($actu->created_by)->image)}}" alt="User Image">
           
              @else
              <img class="img-circle" src="{{asset('user_images/defaultAvatar.png')}}" alt="User Image">
            
              @endif
            <span class="username"><a href="#">{{$actu->GetUser($actu->created_by)->first_name}} {{$actu->GetUser($actu->created_by)->last_name}}</a></span>
            <span class="description">Publie le {{$actu->created_at}} </span>
            </div>

            <div class="box-body">
              <!-- post text -->
              <strong>{{$actu->title}}</strong>
               <p>{{$actu->body}}</p>

               @if ($actu->created_by == Auth::user()->id  || Auth::user()->role ==1 )
               {!! Form::open(['route' => ['actuses.destroy', $actu->actu_id], 'method' => 'delete']) !!}
               <div class='btn-group'>
                   <a href="{{ route('actuses.edit', [$actu->actu_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                   {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn  btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
               </div>
               {!! Form::close() !!} 
              @endif


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
                <span class="username">
                  {{ $comment->GetUser($comment->created_by)->name}} 
                @else
                <img class="img-circle img-sm" src="{{asset('user_images/'.$comment->GetUser($comment->created_by)->image)}}" alt="User Image">
             
                <div class="comment-text">
                      <span class="username">
                           {{ $comment->GetUser($comment->created_by)->first_name}} {{ $comment->GetUser($comment->created_by)->last_name}}
                                           
                       
                </div>
                @endif
                <span class="text-muted pull-right">{{$comment->created_at->format('d M. Y')}} a {{$comment->created_at->format('h:m')}}</span>
              </span>
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
            @endforeach
           
            <!-- /.user-block -->
          
            <!-- /.box-tools -->
          </div>
          </div>
</div>









</div>








{{-- <div class="table-responsive">
    <table class="table" id="actuses-table">
        <thead>
            <tr>
                <th>Created By</th>
        <th>Title</th>
        <th>Body</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($actuses as $actus)
            <tr>
                <td>{{ $actus->created_by }}</td>
            <td>{{ $actus->title }}</td>
            <td>{{ $actus->body }}</td>
                <td>
                    {!! Form::open(['route' => ['actuses.destroy', $actus->actu_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('actuses.show', [$actus->actu_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('actuses.edit', [$actus->actu_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}
