<div class="table-responsive">
    <table id='myTable' class=' display   table table-bordered table-striped table-condensed'>
        <thead>
            <tr>
        <th>Cours</th>
        <th>Classe</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Date de creation</th>
        <th>Ajoute par</th>
        <th>Document</th>
        @if(Auth::user()->role < 3)
                <th >Action</th>
        @endif
            </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
        @if( ($exam->created_by == Auth::user()->id && Auth::user()->role ==2) //si se prof ki kreye l la
        ||
        (Auth::user()->role ==3 && $exam->class_id == $exam->GetConnectedStudent(Auth::user()->id)->class_id) //si se elev ki nan klas exam sa pou li a
        ||
        (Auth::user()->role == 1))
            <tr>
            <td>{{ $exam->InfoCourse->course_name }}</td>
            <td>{{ $exam->InfoClass->class_name }}</td>
            <td>{{ $exam->title }}</td>
            <td>{{ $exam->description }}</td>
            <td>{{ $exam->created_at->format('D. m Y') }}</td>
            {{-- <td>{{ $exam->filename }}</td> --}}
            <td>{{ $exam->GetUser($exam->created_by)->first_name }} {{$exam->GetUser($exam->created_by)->last_name}}</td>
            <td>
                <a href="/exam_files/{{$exam->filename}}" target='_blank'>   
                        <button  >Afficher</button>
                </a>
            </td>
            @if(Auth::user()->role < 3)
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
                @endif
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>



@section('scripts')
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