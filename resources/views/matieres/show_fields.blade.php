<div class='table-responsive' >
    {{-- <table class="table" id="courses-table"> --}}
        <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
                <th></th>
        <th>Nom du cours</th>
        
        <th>Description</th>
        <th>Date de création</th>
        <th>Ajouté par</th>
        <th>Document</th>
        <th>Vidéo</th>
        @if (Auth::user()->role != 3)
            <th >Actions</th>
        @endif
   
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr  >
             <td>
                <a href="{{ route('courses.show', [$course->course_id]) }}"  >
                <img   style="height:55px; width:70px;;" src="{{asset('user_images/book.png')}}" > 
                </a>
            </td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->created_at->format('D. m Y') }}</td>
            <td>{{ $course->GetUser($course->created_by)->first_name }} {{ $course->GetUser($course->created_by)->last_name }}</td>
           
            <td>
                
                @if($course->filename !='')
            
                <a href="/course_files/{{$course->filename}}" target='_blank'>   
                    <button  >Afficher</button>
               </a> 
                @else
               Pas de document
                @endif
            </td>
            @if( $course->videoLink)
            <td type="button"  data-toggle="modal" data-target="#{{ $course->course_id}}"><button class="btn btn-primary"> Regarder</button></td>
                
            @else
            <td > Pas de vidéo</td>
            @endif
        
            <td>
                {!! Form::open(['route' => ['courses.destroy', $course->course_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('courses.show', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @if(Auth::user()->role != 3)
                    <a href="{{ route('courses.edit', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!} 
            </td>
            {{-- @endif --}}
               
            </tr>
           <div class="modal fade" id="{{ $course->course_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">
                                  <p><code>Institution Frere Andre _ Foyer Eveil</code> I.F.A</p>
                                </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="460" src="https://www.youtube.com/embed/{{$course->videoLink}}" frameborder="0" allowfullscreen></iframe> 
                            </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          </div>
                     </div>
                 </div>
                </div>
        @endforeach
        </tbody>
    </table>
</div>


@push('scripts')
<script>

    $(document).ready(function()
    {
        $('#myTable').DataTable({  
            // alert('okokok');
            select:true,
            "language": {
            "lengthMenu": "Voir _MENU_ lignes par page",
            "zeroRecords": "Aucune information",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun resultat trouvé",
            "infoFiltered": "(filtre de _MAX_ total resultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Precedent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush