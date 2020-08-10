<div class="table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
        <th>Droit d'access</th>
        <th>Adresse Email</th>
        {{-- <th>Email Verified At</th> --}}
       
        {{-- <th>Remember Token</th> --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
               
            <td>
                @if ( $user->role == 1)
                     Administrateur
                @elseif( $user->role == 2)
                    Professeur
                @else
                    Etudiant(e)
                @endif
            </td>
            <td>{{ $user->email }}</td>
            {{-- <td>{{ $user->email_verified_at }}</td> --}}
          
            {{-- <td>{{ $user->remember_token }}</td> --}}
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
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