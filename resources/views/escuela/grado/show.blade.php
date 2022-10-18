@extends('layouts.admin')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">{{$g->nombre}} {{$g->seccion}}</h4>



               <div class="row">
                  <div class="col-3">
                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">ACTUALIZAR</button>
                        <button class="nav-link" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">DATOS</button>


                     </div>
                  </div>
                  <div class="col-9">
                     <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

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
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">


                           <div class="row">
                              <div class="col-md-6 p-4">
                                 <p class="text-center h5">MATERIAS</p>

                                 <div class="list-group">

                                    @foreach ($materias as $mate)
                                    <a href="{{route('materiaG.show', $mate->id)}}" class="list-group-item list-group-item-action">{{$mate->nombre}}</a>
                                    @endforeach

                                 </div>

                              </div>
                              <div class="col-md-6 p-4">

                                 <p class="text-center h5">PROFESORES</p>

                                 <div class="list-group">

                                    @foreach ($gp as $profe)
                                    <a href="{{route('profe.show', $profe->profesor_id)}}" class="list-group-item list-group-item-action">{{$profe->profesor->nombre}}</a>
                                    @endforeach

                                 </div>

                              </div>
                           </div>

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