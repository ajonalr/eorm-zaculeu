@extends('layouts.admin')

@section('content')

<div class="contariner-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">REGISTRO DE GRADOS</h4>

               <form action="{{route('grado.save')}}" method="post">
                  @csrf

                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre">
                  </div>

                  <div class="form-group">
                     <label for="">Seccion</label>
                     <input type="text" class="form-control" name="seccion">
                  </div>

                  <button type="submit" class="btn btn-primary"> <i class="fas fa-save    "></i> GUARDAR</button>

               </form>

            </div>
         </div>

      </div>
   </div>
</div>

@endsection