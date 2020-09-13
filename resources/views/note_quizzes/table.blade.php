<div class="table-responsive">
    <table class="table" id="noteQuizzes-table">
        <thead>
            <tr>
                <th>Id Student</th>
        <th>Quiz Id</th>
        <th>Score</th>
        <th>Date</th>
        @if(Auth::user()->role == 1)
                <th colspan="3">Action</th>
            @endif
            </tr>
        </thead>
        <tbody>
        @foreach($noteQuizzes as $noteQuiz)
            <tr>
                <td>{{ $noteQuiz->id_student }}</td>
            <td>{{ $noteQuiz->quiz_id }}</td>
            <td>{{ $noteQuiz->score }}</td>
            <td>{{ $noteQuiz->created_at }}</td>
                <td>
                    {!! Form::open(['route' => ['noteQuizzes.destroy', $noteQuiz->id_note_quiz], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if(Auth::user()->role == 1)
                        <a href="{{ route('noteQuizzes.show', [$noteQuiz->id_note_quiz]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('noteQuizzes.edit', [$noteQuiz->id_note_quiz]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
