<div class="table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
                <th>Exam</th>
        <th>Commentaire</th>
        <th>Date de creation</th>
        <th>Filename</th>
        <th>Created By</th>
        <th>Date de creation</th>
        @if(Auth::user()->role== 3)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($soumissions as $soumission)
        {{-- si se elev --}}
        @if(Auth::user()->role == 3)
            @if($soumission->created_by == Auth::user()->id)
                <tr>
                    <td>{{ $soumission->exam_id }}</td>
                <td>{{ $soumission->description }}</td> 
                <td>{{ $soumission->created_at->format('D. m Y') }}</td>
                <td>
                    <a href="/soumission_files/{{$soumission->filename}}" target='_blank'>   
                            <button  >Afficher</button>
                    </a>
                </td>
                <td>{{ $soumission->created_by }}</td>
                <td>{{ $soumission->created_at }}</td>
                    <td>
                        {!! Form::open(['route' => ['soumissions.destroy', $soumission->soumission_id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('soumissions.show', [$soumission->soumission_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                            <a href="{{ route('soumissions.edit', [$soumission->soumission_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endif
           
            {{-- si se yon prof --}}
            @elseif(Auth::user()->role == 2)
                @if($soumission->GetExam->created_by == Auth::user()->id)
                <tr>
                    <td>{{ $soumission->exam_id }}</td>
                <td>{{ $soumission->description }}</td> 
                <td>{{ $soumission->created_at->format('D. m Y') }}</td>
                <td>
                    <a href="/soumission_files/{{$soumission->filename}}" target='_blank'>   
                            <button  >Afficher</button>
                    </a>
                </td>
                <td>{{ $soumission->created_by }}</td>
                <td>{{ $soumission->created_at }}</td>
                
                </tr>
                @endif  
                
                {{-- si se admin --}}
                @elseif(Auth::user()->role == 1)
                <tr>
                    <td>{{ $soumission->exam_id }}</td>
                <td>{{ $soumission->description }}</td> 
                <td>{{ $soumission->created_at->format('D. m Y') }}</td>
                <td>
                    <a href="/soumission_files/{{$soumission->filename}}" target='_blank'>   
                            <button  >Afficher</button>
                    </a>
                </td>
                <td>{{ $soumission->created_by }}</td>
                <td>{{ $soumission->created_at }}</td>
                
                </tr>

            @endif
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