<div class="row">
<div class="col-md-2">
    <img src="{{asset('user_images/book.png')}}"
    alt="prof image"
    width="130" 
    height="100"/>
</div>
<div class="col-md-10">
    <!-- Description Field -->
    <div class="form-group">
        <h1>{{ $course->course_name }}</h1>
        <span>
            Description: <strong>{{ $course->description }}</strong>
        </span><br>
        <span>
            Ajouté le: <strong>{{ $course->created_at->format('d M. Y') }}</strong>
            par : <strong>{{$course->GetUser($course->created_by)->first_name}}
             {{$course->GetUser($course->created_by)->last_name}}</strong>
        </span>
    </div>


</div>
    <hr>
</div>
<div class="col-md-1">
</div>
<!-- Contenu Field -->
<div class="col-md-10">
    {{-- {!! Form::label('contenu', 'Contenu:') !!} --}}
    {!! $course->contenu !!}
</div>

@if($course->filename)
<div class="col-md-10">
    <hr>
<a href="/course_files/{{$course->filename}}" target='_blank'>   
    Support document
</a>
<hr>
</div>
@endif
@if($course->videoLink)
<div class="col-md-10">
    <iframe width="100%" height="460" src="https://www.youtube.com/embed/{{$course->videoLink}}" frameborder="0" allowfullscreen></iframe> 
</div>
@endif
