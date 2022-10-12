@extends('layouts.admin')


@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">PROFESORES REGISTRADOS</h4>

               <table class="table">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CUI</th>
                        <th>EMAIL</th>
                        <th>CURSOS</th>
                        <th>FECHA DE REGISTRO</th>
                        <th></th>


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
                        <td>
                           <div class="btn-group" role="group" aria-label="">
                              <a href="{{route('profe.show', $pro->id)}}" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                              </a>
                              <form action="{{route('profe.delete', $pro->id)}}" method="post">
                                 @csrf
                                 @method('DELETE')
                                 <button class="btn btn-danger" type="submit">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                 </button>
                              </form>
                           </div>
                        </td>
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