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
               <h4 class="card-title">ASIGNAR PROFESOR A GRADO</h4>

               <form action="{{route('profe.grado_profesor')}}" method="post">
                  @csrf

                  <select name="profesor_id" id="profesor">
                     @foreach ($profesor as $p)
                     <option value="{{$p->id}}">{{$p->nombre}}</option>
                     @endforeach
                  </select>

                  <select name="grado_id" id="grado" class="mt-4">
                     @foreach ($grado as $p)
                     <option value="{{$p->id}}">{{$p->nombre}}, Seccion: {{$p->seccion}}</option>
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
      select: '#profesor',
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });

   new SlimSelect({
      select: '#grado',
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>

@endsection