@extends('layouts.admin')

@section('content')

<div class="contariner-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">EDITAR GRADO / {{$g->nombre}}</h4>

               <form action="{{route('grado.update', $g->id)}}" method="post">
                  @csrf
                  @method('PUT')

                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre" value="{{$g->nombre}}">
                  </div>

                  <div class="form-group">
                     <label for="">Seccion</label>
                     <input type="text" class="form-control" name="seccion" value="{{$g->seccion}}">
                  </div>

                  <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> GUARDAR</button>

               </form>

            </div>
         </div>

      </div>
   </div>
</div>

@endsection