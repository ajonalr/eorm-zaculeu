@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="{{asset('plugins/tag/tag.css')}}">

@endsection

@section('content')

<div class="contariner-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">REGISTRO DE PROFESORES</h4>

               <form action="{{route('profe.save')}}" method="post">
                  @csrf

                  <div class="form-group">
                     <label for="">NOMBRE</label>
                     <input type="text" class="form-control" name="nombre">
                  </div>

                  <div class="form-group">
                     <label for="">PUESTO</label>
                     <input type="text" class="form-control" name="puesto">
                  </div>

                  <div class="form-group">
                     <label for="">CUI</label>
                     <input type="text" class="form-control" name="cui">
                  </div>


                  <div class="form-group">
                     <label for="">CURSOS</label>
                     <input type="text" class="form-control" name="cursos" id="curso">
                  </div>

                  <div class="form-group">
                     <label for="">EMAIL</label>
                     <input type="text" class="form-control" name="email">
                  </div>

                  <div class="form-group">
                     <label for="">CONTRASEÑA</label>
                     <input type="password" class="form-control" name="contrasena">
                  </div>


                  <button type="submit" class="btn btn-primary"> <i class="fas fa-save    "></i> GUARDAR</button>

               </form>

            </div>
         </div>

      </div>
   </div>
</div>

@endsection

@section('scripts')
<script src="{{asset('plugins/tag/tagify.polyfills.min.js')}}"></script>
<script src="{{asset('plugins/tag/tagify.js')}}"></script>
<script>
   var input = document.getElementById('curso')
   var tagify = new Tagify(input, {
      dropdown: {
         maxItems: 0,
         enabled: 0
      },
      whitelist: ["a", "aa", "aaa", "b", "bb", "ccc"]
   })

   tagify.on('change', null)


</script>

@endsection