<div class="table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
            <th>Examen</th>
        <th>Commentaire</th>
        <th>Date de création</th>
        <th>Document</th>
        <th>Ajouté par</th>
        @if(Auth::user()->role== 3)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($soumissions as $soumission)
        {{-- si se elev --}}
     
                <tr>
                    <td>{{ $soumission->InfoExam->title }}</td>
                <td>{{ $soumission->description }}</td> 
                <td>{{ $soumission->created_at->format('D. m Y') }}</td>
                <td>
                    <a href="/soumission_files/{{$soumission->filename}}" target='_blank'>   
                            <button  >Afficher</button>
                    </a>
                </td>
                <td>{{ $soumission->GetUser($soumission->created_by)->first_name }} {{ $soumission->GetUser($soumission->created_by)->last_name }}</td>
                @if(Auth::user()->role == 3)   
                <td>
                        {!! Form::open(['route' => ['soumissions.destroy', $soumission->soumission_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('soumissions.show', [$soumission->soumission_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('soumissions.edit', [$soumission->soumission_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
            "previous":"Précédent",
            "next":"Suivant"
            }


        },
        buttons:['selectRows']
    }

        );
    });
</script>
@endpush