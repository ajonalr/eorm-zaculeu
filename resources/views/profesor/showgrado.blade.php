@extends('layouts.profesor')

@section('content')
<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title text-center">GRADO, {{$grado->nombre}}, {{$grado->seccion}}</h4>


               <ul class="list-group">
                  @foreach ($materias as $m)
                  <li class="list-group-item">{{$m->nombre}}</li>


                  <p>
                     <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#hola{{$m->id}}" aria-expanded="false" aria-controls="hola{{$m->id}}">
                        NUEVA TAREA
                     </button>
                  </p>
                  <div class="collapse" id="hola{{$m->id}}">
                     <form action="{{route('nota.sttoreAndAssignEstudiente')}}" method="post">
                        @csrf

                        <input type="hidden" name="materia_id" value="{{$m->id}}">
                        <input type="hidden" name="grado_id" value="{{$m->grado_id}}">


                        <div class="form-group">
                           <label for="">NOMBRE DE TAREA</label>
                           <input type="text" class="form-control" name="nombre">
                        </div>

                        <div class="form-group">
                           <label for="">valor</label>
                           <input type="number" class="form-control" name="valor">
                        </div>

                        <div class="form-group">
                           <label for="">BIMESTRE</label>
                           <select class="form-control" name="bloque" required>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                           </select>
                        </div>

                        <button type="submit" class="btn btn-primary">GUARDAR</button>

                     </form>
                  </div>


                  @endforeach
               </ul>

            </div>
         </div>
      </div>
   </div>
</div>

@endsection