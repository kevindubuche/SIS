<div class="table-responsive">
    <table class="table" id="matieres-table">
        <thead>
            <tr>
                <th></th>
        {{-- <th>Teacher Id</th>
                <th colspan="3">Action</th> --}}
            </tr>
        </thead>
        <tbody>
       
            
        <div class="container">
            <!-- /.col -->
            <div class="row">
              <div class="col-md-12">
                <!-- Application buttons -->
                    <div class="box">
                        
                        <div class="box-body">
                        
                            @foreach($matieres as $matiere)
                            <div class="btn  col-md-3" >
                            <a href="{{ route('matieres.show', [$matiere->matiere_id]) }}"  >
                                <img src="{{asset('user_images/book.png')}}"
                                alt="prof image"
                                width="130" 
                                height="100"/>
                                <hr>
                             <p>    {{ $matiere->titre }}  </p>
                            </a>
                            @if(Auth::user()->role == 1)
                                
                            {!! Form::open(['route' => ['matieres.destroy', $matiere->matiere_id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                               <a href="{{ route('matieres.edit', [$matiere->matiere_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                            @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
       </div>
   
            </td>
        </tbody>
    </table>
</div>
