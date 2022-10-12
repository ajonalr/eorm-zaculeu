@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{asset('plugins/slim-select/slimselect.min.css') }}">
@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="card mb-4">
            <div class="card-body">

               <p class="h2 text-center">Inscribir</p>

               <form action="{{route('estudiante.store')}}" method="post">
                  @csrf

                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre">
                  </div>

                  <div class="form-group">
                     <label for="">APELLIDO</label>
                     <input type="text" class="form-control" name="apellido">
                  </div>

                  <div class="form-group">
                     <label for="">CUI</label>
                     <input type="text" class="form-control" name="cui">
                  </div>

                  <div class="form-group">
                     <label for="">TELEFONO</label>
                     <input type="text" class="form-control" name="telefono">
                  </div>

                  <div class="form-group">
                     <label for="">PADRE</label>
                     <input type="text" class="form-control" name="padre">
                  </div>

                  <div class="form-group">
                     <label for="">TELEFONO PADRE</label>
                     <input type="text" class="form-control" name="t_padre">
                  </div>

                  <div class="form-group">
                     <label for="">CUI PADRE</label>
                     <input type="text" class="form-control" name="t_cui">
                  </div>

                  <select name="grado_id" id="grado" class="mt-4">
                     @foreach ($grados as $p)
                     <option value="{{$p->id}}">{{$p->nombre}}, Seccion: {{$p->seccion}}</option>
                     @endforeach
                  </select>
                  <button type="submit" class="btn btn-success btn-block">INSCRIBIR</button>



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
      placeholder: 'SELECCIONES PROFESOR',
      deselectLabel: '<span>&times;</span>',
      hideSelectedOption: true,
   });
</script>

@endsection