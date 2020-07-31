<div class='container table-responsive' >
    {{-- <table class="table" id="courses-table"> --}}
        <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
        <th>Nom du cours</th>
        <th>Code du cours</th>
        <th>Description</th>
        <th>Date de creation</th>
        {{-- <th>Status</th> --}}
        <th>Ajoute par</th>
        <th>Document</th>
        @if (Auth::user()->role != 3)
            <th >Actions</th>
        @endif
   
            </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr  id='rowC'  >
            <td>{{ $course->course_name }}</td>
            <td>{{ $course->course_code }}</td>
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
            @if (Auth::user()->role != 3)
        
            <td>
                {!! Form::open(['route' => ['courses.destroy', $course->course_id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{{ route('courses.show', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{{ route('courses.edit', [$course->course_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Vous etes sur?')"]) !!}
                </div>
                {!! Form::close() !!} 
            </td>
            @endif
               
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
            "zeroRecords": "Aucune information - desole",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun resultat trouve",
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