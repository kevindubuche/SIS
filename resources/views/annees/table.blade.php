<div class="table-responsive">
    <table class="table" id="annees-table">
        <thead>
            <tr>
                <th>Titre</th>
                @if(Auth::user()->role ==1)
                <th colspan="3">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach($annees as $annee)
            <tr>
                <td>{{ $annee->title }}</td>
                @if(Auth::user()->role ==1)
                <td>
                    {!! Form::open(['route' => ['annees.destroy', $annee->annee_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('annees.show', [$annee->annee_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('annees.edit', [$annee->annee_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
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
