<div class="table-responsive">
    <table class="table" id="comments-table">
        <thead>
            <tr>
                <th>Created By</th>
        <th>Actu Id</th>
        <th>Body</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comments)
            <tr>
                <td>{{ $comments->created_by }}</td>
            <td>{{ $comments->actu_id }}</td>
            <td>{{ $comments->body }}</td>
                <td>
                    {!! Form::open(['route' => ['comments.destroy', $comments->id_comment], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comments.show', [$comments->id_comment]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('comments.edit', [$comments->id_comment]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
