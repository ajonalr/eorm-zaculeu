@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">REGISTRO DE MATERIAS</h4>

               <form action="{{route('materiaG.store')}}" method="post">
                  @csrf

                  <div class="form-group">
                     <label for="">NOMBRE DE MATERIA</label>
                     <input type="text" class="form-control" name="nombre" required>
                  </div>

                  <select name="grado_id" id="grado" class="mt-4">
                     @foreach ($grado as $p)
                     <option value="{{$p->id}}">{{$p->nombre}}, Seccion: {{$p->seccion}}</option>
                     @endforeach
                  </select>


                  <select name="profesor_id" id="profesor_id" class="mt-4" required>
                     <option >SELECCIONE PROFESOR </option>
                     @foreach ($profesores as $p)
                     <option value="{{$p->id}}">{{$p->nombre}} </option>
                     @endforeach
                  </select>


                  <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> GUARDAR</button>

               </form>

            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('scripts')

<script src="{{asset('plugins/slim-select/slimselect.min.js') }}"></script>


<script>
   new SlimSelect({
      select: '#grado',
      placeholder: 'SELECCIONES GRADO',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });

   new SlimSelect({
      select: '#profesor_id',
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>

@endsection