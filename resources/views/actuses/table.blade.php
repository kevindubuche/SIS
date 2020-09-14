
 <div class="col-md-12">
          
    <div class="col-md-12">
   
        <!-- Box Comment -->
        <div class="box box-widget">
          <div class="box-header with-border">
            <h3 class="box-title">Messages</h3>
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
