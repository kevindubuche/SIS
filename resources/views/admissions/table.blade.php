<div class=" table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
        <th></th>
        <th>Nom</th>
        <th>Classe</th>
        <th>Sexe</th>
        <th>Email</th>
        <th>Téléphone</th>
        @if(Auth::user()->role == 1)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($admissions as $admission)
            <tr>  
            <td><img src="{{asset('user_images/'.$admission->image)}}"
                alt="prof image"
                class="rounded-circle"
                width="50" 
                height="50"
                style="border-radius:50%"/></td>
                {{-- <td>{{ $admission->roll_no }}</td> --}}
            <td>{{ $admission->first_name }} {{ $admission->last_name }}</td>
            <td>{{ $admission->InfoClass->class_name }}</td>
            <td>@if($admission->gender ==0) Masculin @else Féminin @endif</td>
            <td>{{ $admission->email }}</td>
            <td>{{ $admission->phone }}</td>
            
           @if(Auth::user()->role == 1)
                <td>
                    {!! Form::open(['route' => ['admissions.destroy', $admission->student_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admissions.show', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admissions.edit', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
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
            "zeroRecords": "Aucune information",
            "info": "_PAGE_ sur _PAGES_",
            "infoEmpty": "Aucun résultat trouvé",
            "infoFiltered": "(filtre de _MAX_ total resultats)",
            "search": "Rechercher",
            "paginate":{
            "previous":"Précedent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush