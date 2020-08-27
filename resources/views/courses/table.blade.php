<div class='table-responsive' >
    {{-- <table class="table" id="courses-table"> --}}
        <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
                <th></th>
        <th>Nom du cours</th>
        
        <th>Description</th>
        <th>Date de création</th>
        {{-- <th>Status</th> --}}
        <th>Ajouté par</th>
        <th>Document</th>
        <th>Vidéo</th>
        @if (Auth::user()->role == 2)
            <th >Actions</th>
        @endif
   
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr  id='rowC'  >
                <td>

                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <img   style="height:100%; width:100%;" src="{{asset('user_images/book.png')}}" > 
                    </div>  
                </td>
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->description }}</td>
            <td>{{ $course->created_at->format('D. m Y') }}</td>
            <td>{{ $course->GetUser($course->created_by)->first_name }} {{ $course->GetUser($course->created_by)->last_name }}</td>
            {{-- <td> 
               @if($course->status == 1)  
               <div class="btn btn-success">Actif</div>
               @else
               <div class="btn btn-danger">Inactif</div>
               @endif
            </td> --}}
            <td>
                <a href="/course_files/{{$course->filename}}" target='_blank'>   
                        <button  >Afficher</button>
                </a>
            </td>
            @if( $course->videoID)
            <td type="button"  data-toggle="modal" data-target="#{{ $course->videoID}}"><button class="btn btn-primary"> Regarder</button></td>
                
            @else
            <td > Pas de vidéo</td>
            @endif


           
            {{-- @if (Auth::user()->role == 2) --}}
        
            <td>
                {!! Form::open(['route' => ['courses.destroy', $course->course_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('courses.show', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{ route('courses.edit', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
                </div>
                {!! Form::close() !!} 
            </td>
            {{-- @endif --}}
               
            </tr>
            <tr>

                <td  
                    class="modal fade" id="{{ $course->videoID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                                <iframe width="100%" height="460" src="https://www.youtube.com/embed/{{$course->videoID}}" frameborder="0" allowfullscreen></iframe> 
   

                            
                         </div>
                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          </div>
                     </div>
                 </div>
   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('scripts')
<script>
//     $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
    
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