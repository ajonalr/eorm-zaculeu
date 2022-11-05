@extends('layouts.reportes')


@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title text-uppercase text-center">Grados Registrados</h4>


               <table class="table">
                  <thead>
                     <tr>
                        <th>id</th>
                        <th>NOMBRE</th>
                        <th>SECCION</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $g)
                     <tr>
                        <td>{{$g->id}}</td>
                        <td>{{$g->nombre}}</td>
                        <td>{{$g->seccion}}</td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>


            </div>
         </div>
      </div>
   </div>
</div>

@endsection