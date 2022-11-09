@extends('layouts.profesor')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col-md-3">


         <div class="card">
            <img class="card-img-top rounded-circle" src="https://ui-avatars.com/api/?name={{session()->get('profe')['nombre']}}" alt="">
            <div class="card-body">

               <p class="card-text">NOMBRE: {{session()->get('profe')['nombre']}}</p>
               <p class="card-text">PUESTO: {{session()->get('profe')['puesto']}}</p>
               <p class="card-text">EMAIL: {{session()->get('profe')['email']}}</p>
            </div>
         </div>

      </div>

      <div class="col-md-9">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title"> CURSOS </h4>
               <ul class="list-group">
                  @foreach ($fata as $data )
                  <li class="list-group-item active">{{$data->nombre}} / {{$data->grado->nombre}}, {{$data->grado->seccion}}</li>
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection