<div class="table-responsive">
    <table class="table" id="departements-table">
        <thead>
            <tr>
                {{-- <th>Faculty Id</th> --}}
        <th>Département</th>
        <th>Code du departément</th>
        <th>Description</th>
    
        <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($departements as $departement)
            <tr>
                {{-- <td>{{ $departement->InfoFaculty->faculty_name }}</td> --}}
            <td>{{ $departement->departement_name }}</td>
            <td>{{ $departement->departement_code }}</td>
            <td>{{ $departement->departement_description }}</td>
           
                <td>
                    {!! Form::open(['route' => ['departements.destroy', $departement->departement_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('departements.show', [$departement->departement_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('departements.edit', [$departement->departement_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
