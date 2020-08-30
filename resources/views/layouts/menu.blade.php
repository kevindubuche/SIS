<li >
    <a href="{{ url('/home') }}"><i class="fa fa-home"></i><span>Accueil</span></a>
</li>


<li class="{{ Request::is('actuses*') ? 'active' : '' }}">
    <a href="{{ route('actuses.index') }}"><i class="fa fa-envelope"></i><span>Messages</span></a>
</li>

<li class="{{ Request::is('matieres*') ? 'active' : '' }}">
    <a href="{{ route('matieres.index') }}"><i class="fa fa-book"></i><span>Matières</span></a>
</li>


{{-- <li class="{{ Request::is('courses*') ? 'active' : '' }}">
    <a href="{{ route('courses.index') }}"><i class="fa fa-book"></i><span>Cours</span></a>
</li> --}}

@if(Auth::user()->role==1)
<li class="treeview">
    <a href="#">
        <i class=" fa fa-dashboard"></i><span>Général</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">
    <li class="{{ Request::is('classes*') ? 'active' : '' }}">
        <a href="{{ route('classes.index') }}"><i class="fa fa-graduation-cap"></i><span>Classes</span></a>
    </li>
    
    <li class="{{ Request::is('annees*') ? 'active' : '' }}">
        <a href="{{ route('annees.index') }}"><i class="fa fa-edit"></i><span>Années académiques</span></a>
    </li>
    
    
    <li class="{{ Request::is('semesters*') ? 'active' : '' }}">
        <a href="{{ route('semesters.index') }}"><i class="fa fa-calendar-times-o"></i><span>Etapes</span></a>
    </li>

  
    <li class="{{ Request::is('departements*') ? 'active' : '' }}">
        <a href="{{ route('departements.index') }}"><i class="fa fa-code-fork"></i><span>Départements</span></a>
    </li>

    <li class="{{ Request::is('classAssignings*') ? 'active' : '' }}">
        <a href="{{ route('classAssignings.index') }}"><i class="fa fa-exchange"></i><span>Assignations</span></a>
    </li>
    

</ul>
</li>
@endif



{{-- 
<li class="{{ Request::is('classSchedulings*') ? 'active' : '' }}">
    <a href="{{ route('classSchedulings.index') }}"><i class="fa fa-calendar"></i><span>Horaire</span></a>
</li> --}}


@if(Auth::user()->role < 3)

    <li class="{{ Request::is('admissions*') ? 'active' : '' }}">
        <a href="{{ route('admissions.index') }}"><i class="fa fa-user"></i><span>Elèves</span></a>
    </li>

@endif

{{-- FOR ADMIN ONLY --}}

    @if(Auth::user()->role == 1)
    {{-- CAN CRUD PROFS --}}
  
    {{-- CAN CRUD USERS --}}
    <li class="{{ Request::is('teachers*') ? 'active' : '' }}">
        <a href="{{ route('teachers.index') }}"><i class="fa fa-user-circle"></i><span>Professeurs</span></a>
    </li>
    
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}"><i class="fa fa-group"></i><span>Utilisateurs</span></a>
    </li>

    {{-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>Roles</span></a>
    </li> --}}
    
    @endif

    {{-- PROFILE VIEW--}}
    <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ url('/profile/'.Auth::user()->id)}}"><i class="fa fa-user-circle"></i><span>Mon profil</span></a>
    </li>

    

<li class="treeview">
    <a href="#">
        <i class=" fa fa-briefcase"></i><span>Examens</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
<ul class="treeview-menu">
<li class="{{ Request::is('exams*') ? 'active' : '' }}">
    <a href="{{ route('exams.index') }}"><i class="fa fa-briefcase"></i><span>Examens</span></a>
</li>

<li class="{{ Request::is('soumissions*') ? 'active' : '' }}">
    <a href="{{ route('soumissions.index') }}"><i class="fa fa-book"></i><span>Soumissions</span></a>
</li>

</ul>
</li>



{{-- 
<li class="{{ Request::is('actuAssignings*') ? 'active' : '' }}">
    <a href="{{ route('actuAssignings.index') }}"><i class="fa fa-edit"></i><span>Actu Assignings</span></a>
</li>
 --}}
