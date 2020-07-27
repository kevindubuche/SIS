<div class="container table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
        <th></th>
        <th> Nom</th>
        <th>Departement</th>
        <th>Classe</th>
        <th>Sexe</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Adresse</th>
        
                <th >Action</th>
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
            <td>{{ $admission->InfoDepartement->departement_name }}</td>
            <td>{{ $admission->InfoClass->class_name }}</td>
            <td>@if($admission->gender ==0) Masculin @else Feminin @endif</td>
            <td>{{ $admission->email }}</td>
            <td>{{ $admission->phone }}</td>
            <td>{{ $admission->adress }}</td>
            
           
                <td>
                    {!! Form::open(['route' => ['admissions.destroy', $admission->student_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admissions.show', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admissions.edit', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
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