@extends('layouts.profesor')


@section('content')
<div class="container mt-4">
   <div class="row">
      <div class="col">

         <div class="card border-info">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
               <h4 class="card-title">TAREAS REGISTRADAS</h4>


               <form action="">
                  <div class="form-group">
                     <label for="">BIMESTRE</label>
                     <select class="form-control" name="bimestre" id="">
                        <option value="1">1 (bimestre)</option>
                        <option value="2">2 (bimestre)</option>
                        <option value="3">3 (bimestre)</option>
                        <option value="4">4 (bimestre)</option>
                     </select>
                  </div>
                  <button type="submit" class="btn btn-success">BUSCAR</button>
               </form>


               <!-- TODO: evaluar para mostrar table pra calificar -->

               @if ($vis2)
               <form action="">
                  <div class="form-group">
                     <label for="">TAREA</label>
                     <select class="form-control" name="nota_final_id" id="">
                        @foreach ($tareas as $t)
                        <option value="{{$t->id}}">{{$t->nombre}}</option>
                        @endforeach
                     </select>
                  </div>
                  <button type="submit" class="btn btn-success">BUSCAR</button>
               </form>
               @endif


               @if ($vis)
               <table class="table">
                  <thead>
                     <tr>
                        <th>ESTUDIANTE</th>
                        <th>TAREA</th>
                        <th>VALOR DE TAREA</th>
                        <th>NOTA</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>

                     @foreach ($calificar as $t)
                     <tr>
                        <td>{{$t->estudiante->nombre}}</td>
                        <td>{{$t->tarea->nombre}}</td>
                        <td>{{$t->tarea->valor}}</td>
                        <td>{{$t->calificacion}}</td>
                        <td>

                           <form action="{{route('profe.calificarnOTA', $t->id)}}" method="POST">
                              @csrf
                              @method('PUT')

                              <div class="form-group">
                                 <label for="">CALIFICACION</label>
                                 <input type="number" steep="any" value="{{$t->calificacion}}" class="form-control form-control-sm " name="calificacion">

                              </div>

                           </form>

                        </td>
                     </tr>

                     @endforeach

                  </tbody>
               </table>

               @endif

            </div>
         </div>
      </div>
   </div>
</div>

@endsection