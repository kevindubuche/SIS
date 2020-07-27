<li >
    <a href="{{ url('/home') }}"><i class="fa fa-home"></i><span>Accueil</span></a>
</li>


<li class="{{ Request::is('actuses*') ? 'active' : '' }}">
    <a href="{{ route('actuses.index') }}"><i class="fa fa-tags"></i><span>Actualites</span></a>
</li>


<li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{{ route('courses.index') }}"><i class="fa fa-book"></i><span>Cours</span></a>
</li>


<li class="treeview">
    <a href="#">
        <i class=" fa fa-dashboard"></i><span>General</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">
    <li class="{{ Request::is('classes*') ? 'active' : '' }}">
        <a href="{{ route('classes.index') }}"><i class="fa fa-graduation-cap"></i><span>Classes</span></a>
    </li>

    {{-- <li class="{{ Request::is('classrooms*') ? 'active' : '' }}">
        <a href="{{ route('classrooms.index') }}"><i class="fa fa-edit"></i><span>Classrooms</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('levels*') ? 'active' : '' }}">
        <a href="{{ route('levels.index') }}"><i class="fa fa-bar-chart-o"></i><span>Niveaux</span></a>
    </li> --}}

    
    <li class="{{ Request::is('semesters*') ? 'active' : '' }}">
        <a href="{{ route('semesters.index') }}"><i class="fa fa-calendar-times-o"></i><span>Semestres</span></a>
    </li>

    <li class="{{ Request::is('faculties*') ? 'active' : '' }}">
        <a href="{{ route('faculties.index') }}"><i class="fa  fa-university"></i><span>Facultes</span></a>
    </li>

    <li class="{{ Request::is('departements*') ? 'active' : '' }}">
        <a href="{{ route('departements.index') }}"><i class="fa fa-code-fork"></i><span>Departements</span></a>
    </li>

    {{-- <li class="{{ Request::is('batches*') ? 'active' : '' }}">
        <a href="{{ route('batches.index') }}"><i class="fa fa-edit"></i><span>Batches</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('shifts*') ? 'active' : '' }}">
        <a href="{{ route('shifts.index') }}"><i class="fa fa-edit"></i><span>Shifts</span></a>
    </li> --}}

   

    {{-- <li class="{{ Request::is('times*') ? 'active' : '' }}">
        <a href="{{ route('times.index') }}"><i class="fa fa-edit"></i><span>Times</span></a>
    </li> --}}

 

    {{-- <li class="{{ Request::is('academics*') ? 'active' : '' }}">
        <a href="{{ route('academics.index') }}"><i class="fa  fa-clock-o"></i><span>Annee Academique</span></a>
    </li> --}}

    {{-- <li class="{{ Request::is('days*') ? 'active' : '' }}">
        <a href="{{ route('days.index') }}"><i class="fa fa-edit"></i><span>Days</span></a>
    </li> --}}

</ul>
</li>


<li class="treeview">
    <a href="#">
        <i class=" fa fa-calendar"></i><span>Horaire</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">

{{-- <li class="{{ Request::is('classAssignings*') ? 'active' : '' }}">
    <a href="{{ route('classAssignings.index') }}"><i class="fa fa-exchange"></i><span>Affectations</span></a>
</li> --}}

<li class="{{ Request::is('classSchedulings*') ? 'active' : '' }}">
    <a href="{{ route('classSchedulings.index') }}"><i class="fa fa-calendar"></i><span>Horaire</span></a>
</li>

</ul>
</li>

{{-- <li class="treeview">
    <a href="#">
        <i class=" fa fa-dashboard"></i><span>Faculty</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">


       

</ul>
</li> --}}


{{-- @if(Auth::user()->role < 4)
<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{{ route('transactions.index') }}"><i class="fa fa-money"></i><span>Transactions</span></a>
</li>
@endif --}}
<li class="{{ Request::is('admissions*') ? 'active' : '' }}">
    <a href="{{ route('admissions.index') }}"><i class="fa fa-user"></i><span>Etudiants</span></a>
</li>


{{-- 
@if(Auth::user()->role < 4)
<li class="{{ Request::is('attendances*') ? 'active' : '' }}">
    <a href="{{ route('attendances.index') }}"><i class="fa fa-calendar"></i><span>Attendances</span></a>
</li>
@endif --}}
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>



{{-- 
<li class="{{ Request::is('statuses*') ? 'active' : '' }}">
    <a href="{{ route('statuses.index') }}"><i class="fa fa-edit"></i><span>Statuses</span></a>
</li> --}}


{{-- FOR ADMIN ONLY --}}

    @if(Auth::user()->role < 2)
    {{-- CAN CRUD PROFS --}}
    <li class="{{ Request::is('teachers*') ? 'active' : '' }}">
        <a href="{{ route('teachers.index') }}"><i class="fa fa-user-circle"></i><span>Professeurs</span></a>
    </li>
    {{-- CAN CRUD USERS --}}
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}"><i class="fa fa-group"></i><span>Utilisateurs</span></a>
    </li>
    @endif

    {{-- PROFILE VIEW--}}
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ url('/profile/'.Auth::user()->id)}}"><i class="fa fa-user-circle"></i><span>Profile</span></a>
    </li>
  

{{-- <li class="{{ Request::is('comments*') ? 'active' : '' }}">
    <a href="{{ route('comments.index') }}"><i class="fa fa-edit"></i><span>Commentaires</span></a>
</li> --}}

<li class="{{ Request::is('exams*') ? 'active' : '' }}">
    <a href="{{ route('exams.index') }}"><i class="fa fa-edit"></i><span>Examens</span></a>
</li>

