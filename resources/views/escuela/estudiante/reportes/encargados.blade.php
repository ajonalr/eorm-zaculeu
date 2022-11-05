@extends('layouts.reportes')

@section('content')
<div class="container">
   <div class="row">
      <div class="col">
         <div class="text-center h3">ESTUDIENTES</div>
         <table class="table">
            <thead>
               <tr>
                  <th>NOMBRE</th>
                  <th>TELEFONO</th>
                  <th>GRADO</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $d)
               <tr>
                  <td>{{$d->nombre}} {{$d->apellido}}</td>
                  <td>{{$d->telefono}}</td>
                  <td>{{$d->grado->nombre}}, Seccion: {{$d->grado->seccion}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection