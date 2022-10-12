@extends('layouts.admin')


@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">Grados Registrados</h4>


               <table class="table">
                  <thead>
                     <tr>
                        <th>id</th>
                        <th>NOMBRE</th>
                        <th>SECCION</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($grado as $g)
                     <tr>
                        <td>{{$g->id}}</td>
                        <td>{{$g->nombre}}</td>
                        <td>{{$g->seccion}}</td>
                        <td>


                           <div class="btn-group" role="group" aria-label="">
                              <a href="{{route('grado.show', $g->id)}}" type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i>
                              </a>
                              <a type="button" class="btn btn-warning" href="{{route('grado.editar', $g->id)}}">
                                 <i class="fas fa-edit"></i>
                              </a>
                              <form action="{{route('grado.delete', $g->id)}}" method="post">
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