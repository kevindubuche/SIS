@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Annee academique
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($annee, ['route' => ['annees.update', $annee->annee_id], 'method' => 'patch']) !!}

                        @include('annees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection