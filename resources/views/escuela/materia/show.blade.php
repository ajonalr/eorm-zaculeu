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
               <h4 class="card-title">{{$data->nombre}} - {{$data->grado->nombre}}</h4>



               <div class="row">
                  <div class="col-3">
                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">ACTUALIZAR</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">ASIGNAR CUADRO TOTAL</button>

                        <button class="nav-link" id="v-pills-NOTASASIG-tab" data-toggle="pill" data-target="#v-pills-NOTASASIG" type="button" role="tab" aria-controls="v-pills-NOTASASIG" aria-selected="false">NOTAS FINALES</button>



                     </div>
                  </div>
                  <div class="col-9">
                     <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                           <form action="{{route('materiaG.update', $data->id)}}" method="post">
                              @csrf
                              @method('PUT')

                              <div class="form-group">
                                 <label for="">NOMBRE DE MATERIA</label>
                                 <input type="text" class="form-control" name="nombre" value="{{$data->nombre}}">
                              </div>

                              <select name="grado_id" id="grado" class="mt-4">

                                 <option value="{{$data->grado_id}}">{{$data->grado->nombre}}, Seccion: {{$data->grado->seccion}}</option>


                                 @foreach ($grado as $p)
                                 <option value="{{$p->id}}">{{$p->nombre}}, Seccion: {{$p->seccion}}</option>
                                 @endforeach
                              </select>

                              <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i> GUARDAR</button>

                           </form>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                           @include('escuela.materia.formregistrotareagrado')

                        </div>


                        <div class="tab-pane fade" id="v-pills-NOTASASIG" role="tabpanel" aria-labelledby="v-pills-NOTASASIG-tab">

                           NOTAS ASIGNADAS

                        </div>

                     </div>
                  </div>
               </div>

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