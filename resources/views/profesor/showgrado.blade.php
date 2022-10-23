@extends('layouts.profesor')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title text-center">GRADO, {{$grado->nombre}}, {{$grado->seccion}}</h4>
               <p class="card-text">

               </p>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection