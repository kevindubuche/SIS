<div class="table-responsive">
    <table class="table" id="actuAssignings-table">
        <thead>
            <tr>
                <th>Actu Id</th>
        <th>Class Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($actuAssignings as $actuAssigning)
            <tr>
                <td>{{ $actuAssigning->InfoActu->title }}</td>
            <td>{{ $actuAssigning->InfoClass->class_name }}</td>
                <td>
                    {!! Form::open(['route' => ['actuAssignings.destroy', $actuAssigning->actu_assigning_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                      {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
