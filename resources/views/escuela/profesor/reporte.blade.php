@extends('layouts.reportes')


@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-titl text-center">PROFESORES REGISTRADOS</h4>

               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CUI</th>
                        <th>EMAIL</th>
                        <th>CURSOS</th>
                        <th>FECHA DE REGISTRO</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($data as $pro)
                     <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->nombre}}</td>
                        <td>{{$pro->cui}}</td>
                        <td>{{$pro->email}}</td>
                        <td>

                           <?php  $array= json_decode($pro->cursos, true); ?>

                           @foreach ($array as $curso)
                              <span class="badge badge-info">{{$curso['value']}}</span>
                           @endforeach

                        </td>
                        <td>{{$pro->created_at}}</td>
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