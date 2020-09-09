@extends('layouts.app')
@if(Auth::user()->role < 3)
    @section('content')
        <section class="content-header">
            <h1>
                Examen
            </h1>
        </section>
        <div class="content">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row" style="padding-left: 20px">
                        @include('exams.show_fields')
                        <a href="{{ route('exams.index') }}" class="btn btn-default">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
