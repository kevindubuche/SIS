<div class="table-responsive">
    <table class="table" id="exams-table">
        <thead>
            <tr>
        <th>Cours</th>
        <th>Classe</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Ajoute par</th>
        <th>Document</th>
        
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
            <tr>
            <td>{{ $exam->InfoCourse->course_name }}</td>
            <td>{{ $exam->InfoClass->class_name }}</td>
            <td>{{ $exam->title }}</td>
            <td>{{ $exam->description }}</td>
            {{-- <td>{{ $exam->filename }}</td> --}}
            <td>{{ $exam->GetUser($exam->created_by)->name }}</td>
            <td>
                <a href="/exam_files/{{$exam->filename}}" target='_blank'>   
                        <button  >Afficher</button>
                </a>
            </td>
                <td>
                    {!! Form::open(['route' => ['exams.destroy', $exam->exam_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('exams.show', [$exam->exam_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a 
                        data-toggle="modal" data-target="#edit-exam-modal" 
                        data-exam_id="{{ $exam->exam_id }}"
                        data-class_id="{{ $exam->class_id }}"
                        data-course_id="{{ $exam->course_id }}"
                        data-title="{{ $exam->title }}"
                        data-description="{{ $exam->description }}"
                        data-filename="{{ $exam->filename }}"
                         {{-- href="{{ route('exams.edit', [$exam->exam_id]) }}"  --}}
                         class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Etes-vous sur ?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>



@section('scripts')
 <script>



        // {{-------batch view side--------}}
        $('#edit-exam-modal').on('show.bs.modal', function(event){
    
            var button = $(event.relatedTarget)
            var course_id = button.data('course_id')
            var class_id = button.data('class_id')
            var title = button.data('title')
            var description = button.data('description')
            var filename = button.data('filename')
            var exam_id = button.data('exam_id')

            var modal =$(this)

            modal.find('.modal-title').text('MODIFIER EXAMEN');
            modal.find('.modal-body #course_id2').val(course_id);
            modal.find('.modal-body #class_id2').val(class_id);
            modal.find('.modal-body #title2').val(title);
            modal.find('.modal-body #description2').val(description);
            modal.find('.modal-body #old_filename').val(filename);
            modal.find('.modal-body #exam_id2').val(exam_id);

        });


    </script>
@endsection