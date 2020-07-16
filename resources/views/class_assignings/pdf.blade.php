<style>
    .pull{
        text-align: center;
        border: 1px solid;
    }
    th {
        text-align: :center;
    }
    table{
        align-content: center;
    }
</style>

<div class="table-responsive-lg">
    <h1 style="float: right; color:blue; margin-top:20px;"><i>Systeme d'information Academique</i></h1>
    <h5><i>Nom:</i>Faculte des sciences</h5>
    <h5><i>Adresse:</i>Rue Monseigneur Guilloux</h5>
    <h5><i>Email:</i>fsd.edu.mail@edu.ht</h5>
    <h5><i>Telephone:</i>+509 36870473</h5>

    <table class="table" id="classAssignings-table">
        <caption style="margin-top: 20px;">Assignations</caption>
        <thead>
            <tr>
                <th>Professeur</th>
                <th>Semestre</th>
                <th>Cours</th>
                <th>Datails du cours</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classAssignings as $classAssigning)
            <tr class="border">
                <td class="col-md-3 pull">{{ $classAssigning->InfoTeacher->first_name }} {{ $classAssigning->InfoTeacher->last_name }}</td>
                <td class="col-md-3 pull">{{ $classAssigning->InfoClassSchedule->InfoSemester['semester_name'] }}</td>
                <td class="col-md-6 pull">{{ $classAssigning->InfoClassSchedule->InfoCourse['course_name']}}  </td>
                <td class="col-md-6 pull">
               <span style="font-weight:bold;">Classe:</span> {{ $classAssigning->InfoClassSchedule->InfoClass['class_name'] }} |  
               <span style="font-weight:bold;">Cours:</span>  {{ $classAssigning->course_name }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>