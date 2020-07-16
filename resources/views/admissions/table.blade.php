<div class="table-responsive">
    <table class="table" id="admissions-table">
        <thead>
            <tr>
        <th></th>
        <th> Name</th>
        {{-- <th>Last Name</th> --}}
        <th>Faculty</th>
        <th>Departement</th>
        <th>Batch</th>

        <th>Father Name</th>
        <th>Father Phone</th>
        <th>Mother Name</th>
        <th>Mother Phone</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Dob</th>
        <th>Phone</th>
        <th>Adress</th>
        <th>Status</th>
        <th>Dateregistered</th>
        <th>User Id</th>
        <th>Class Id</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admissions as $admission)
            <tr>  
            <td><img src="{{asset('student_images/'.$admission->image)}}"
                alt="prof image"
                class="rounded-circle"
                width="50" 
                height="50"
                style="border-radius:50%"/></td>
                {{-- <td>{{ $admission->roll_no }}</td> --}}
            <td>{{ $admission->first_name }} {{ $admission->last_name }}</td>
            {{-- <td>{{ $admission->last_name }}</td> --}}
            <td>{{ $admission->InfoFaculty->faculty_name }}</td>
            <td>{{ $admission->InfoDepartement->departement_name }}</td>
            <td>{{ $admission->InfoBatch->batch }}</td>

            <td>{{ $admission->father_name }}</td>
            <td>{{ $admission->father_phone }}</td>
            <td>{{ $admission->mother_name }}</td>
            <td>{{ $admission->mother_phone }}</td>
            <td>@if($admission->gender ==0) Male @else Female @endif</td>
            <td>{{ $admission->email }}</td>
            <td>{{ $admission->dob }}</td>
            <td>{{ $admission->phone }}</td>
            <td>{{ $admission->adress }}</td>
            <td>@if($admission->status ==0) Active @else Inactive @endif</td>
            <td>{{ $admission->dateRegistered }}</td>
            <td>{{ $admission->user_id }}</td>
            <td>{{ $admission->class_id }}</td>
            {{-- <td>{{ $admission->image }}</td> --}}
          
                <td>
                <td>
                    {!! Form::open(['route' => ['admissions.destroy', $admission->student_id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('admissions.show', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('admissions.edit', [$admission->student_id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
