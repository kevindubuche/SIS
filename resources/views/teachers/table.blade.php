<div class="table-responsive">
    <table class="table" id="teachers-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Dob</th>
        <th>Phone</th>
        <th>Adress</th>
        <th>Status</th>
        <th>Dateregistered</th>
        <th>User Id</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($teachers as $teacher)
            <tr>
                <td>{{ $teacher->first_name }}</td>
            <td>{{ $teacher->last_name }}</td>
            <td>{{ $teacher->gender }}</td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->dob }}</td>
            <td>{{ $teacher->phone }}</td>
            <td>{{ $teacher->adress }}</td>
            <td>{{ $teacher->status }}</td>
            <td>{{ $teacher->dateRegistered }}</td> 
            <td>{{ $teacher->user_id }}</td>
            <td><img src="{{asset('teacher_images/'.$teacher->image)}}"
                alt="prof image"
                class="rounded-circle"
                width="50" 
                height="50"
                style="border-radius:50%"/></td>
                <td>
                    {!! Form::open(['route' => ['teachers.destroy', $teacher->teacher_id], 'method' => 'delete']) !!}
                  
                        <a href="{{ route('teachers.show', [$teacher->teacher_id]) }}" target="_blank" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('teachers.edit', [$teacher->teacher_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                       
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

{{-- 
{{-- THE MODAL FOR THE VIEW --}}
  <!-- Modal -->
  <div class="modal fade" id="view-teacher-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <input type="hidden" name="teacher_id" id="teacher_id">
                        
            <!-- First Name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Last Name Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Gender Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('gender', 'Gender:') !!}
                {!! Form::text('gender', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Email Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Dob Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dob', 'Dob:') !!}
                {!! Form::text('dob2', null, ['class' => 'form-control','id'=>'dob2']) !!}
            </div>

            @push('scripts')
                <script type="text/javascript">
                    $('#dob2').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- Phone Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('phone', 'Phone:') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Adress Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('adress', 'Adress:') !!}
                {!! Form::textarea('adress', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Status Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('status', 'Status:') !!}
                <label class="checkbox-inline">
                    {!! Form::hidden('status', 0) !!}
                    {!! Form::checkbox('status', '1', null) !!}
                </label>
            </div>


            <!-- Dateregistered Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dateRegistered', 'Dateregistered:') !!}
                {!! Form::text('dateRegistered', null, ['class' => 'form-control','id'=>'dateRegistered']) !!}
            </div>

            @push('scripts')
                <script type="text/javascript">
                    $('#dateRegistered').datetimepicker({
                        format: 'YYYY-MM-DD HH:mm:ss',
                        useCurrent: true,
                        sideBySide: true
                    })
                </script>
            @endpush

            <!-- User Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('user_id', 'User Id:') !!}
                {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Image Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('image', 'Image:') !!}
                {!! Form::text('image2', null, ['class' => 'form-control']) !!}
            </div>



</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  {!! Form::submit('Save Teacher', ['class' => 'btn btn-primary']) !!}
</div>
</div>
</div>

</div>


@section('scripts')
 <script>
        // {{-------batch view side--------}}
        $('#view-teacher-modal').on('show.bs.modal', function(event){
          console.log('ou la')
            var button = $(event.relatedTarget)    

            var first_name = button.data('first_name')
            var last_name = button.data('last_name')
            var gender = button.data('gender')
            var email = button.data('email')
            var dob = button.data('dob')
            var phone = button.data('phone')
            var adress = button.data('adress')
            var status = button.data('status')
            var dateRegistered = button.data('dateRegistered')
            var user_id = button.data('user_id')
            var image = button.data('image')

            var modal =$(this)

            modal.find('.modal-title').text('VIEW TEACHER INFORMATION');
            modal.find('.modal-body #first_name').val(first_name);
            modal.find('.modal-body #last_name').val(last_name);
            modal.find('.modal-body #gender').val(gender);
            modal.find('.modal-body #email').val(email);
            modal.find('.modal-body #dob').val(dob);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #adress').val(adress);
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #dateRegistered').val(dateRegistered);
            modal.find('.modal-body #user_id').val(user_id);
            modal.find('.modal-body #image').val(image);

        });


    </script>
@endsection --}}