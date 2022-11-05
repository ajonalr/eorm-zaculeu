@extends('layouts.admin')

@section('content')

<div class="container">
   <div class="row">
      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">ESTUDIANTES</h4>
               <p class="card-text">RETORNA EL REPORTES DE TODOS LOS ESTUDIENTES INSCRITOS</p>
               <a class="btn btn-primary" href="{{route('estu.allEstudentReport')}}" role="button"><i class="fa fa-print" aria-hidden="true"></i></a>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">GRADOS </h4>
               <p class="card-text">IMPRIME EL REPORTE DE LOS ESTUDIENTES INCRITOS EN CADA GRADO</p>
               <form action="{{route('estu.estudentToGrado')}}" method="get">
                  <div class="form-group">
                     <label for="">GRADOS</label>
                     <select class="form-control" name="grado_id">
                        @foreach ($grados as $g)
                        <option value="{{$g->id}}">{{$g->nombre}}, {{$g->seccion}}</option>
                        @endforeach
                     </select>
                  </div>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"></i></button>
               </form>
            </div>
         </div>
      </div>

      <div class="col-md-4">
         <div class="card">
            <div class="card-body">
               <h4 class="card-title">ENCARGADOS</h4>
               <p class="card-text">RETORNA EL REPORTES DE TODOS LOS ENCARGADOS</p>
               <a class="btn btn-primary" href="{{route('estu.encargado')}}" role="button"><i class="fa fa-print" aria-hidden="true"></i></a>
            </div>
         </div>
      </div>

   </div>
</div>

@endsection