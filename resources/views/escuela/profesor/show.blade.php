@extends('layouts.admin')

@section('styles')

<link rel="stylesheet" href="{{asset('plugins/tag/tag.css')}}">

@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">{{$g->nombre}} {{$g->email}}</h4>



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

                           <form action="{{route('profe.update', $g->id)}}" method="post">
                              @csrf
                              @method('put')
                              <div class="form-group">
                                 <label for="">NOMBRE</label>
                                 <input type="text" class="form-control" value="{{$g->nombre}}" name="nombre">
                              </div>
                              <div class="form-group">
                                 <label for="">PUESTO</label>
                                 <input type="text" class="form-control" value="{{$g->puesto}}" name="puesto">
                              </div>
                              <div class="form-group">
                                 <label for="">CUI</label>
                                 <input type="text" class="form-control" value="{{$g->cui}}" name="cui">
                              </div>
                              <div class="form-group">
                                 <label for="">CURSOS</label>
                                 <input type="text" class="form-control" value="{{$g->cursos}}" name="cursos" id="curso">
                              </div>
                              <div class="form-group">
                                 <label for="">EMAIL</label>
                                 <input type="text" class="form-control" value="{{$g->email}}" name="email">
                              </div>
                              <button type="submit" class="btn btn-primary"> <i class="fas fa-save    "></i> GUARDAR</button>

                           </form>

                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                           <p>NOMBRE: {{$g->nombre}}</p>
                           <p>CUI: {{$g->cui}}</p>
                           <p>PUESTO: {{$g->puesto}}</p>
                           <p>EMAIL: {{$g->email}}</p>

                           <p>
                              ASESOR DE GRADO/S:
                              @foreach ($grados as $gr)
                           <p>
                              Grado: {{$gr->grado->nombre}}
                              <br>
                              Seccion: {{$gr->grado->seccion}}


                           </p>
                           @endforeach
                           </p>

                           <p>CURSOS QUE IMPARTE:</p>

                           <?php $array = json_decode($g->cursos, true); ?>

                           @foreach ($array as $curso)
                           <h4><span class="badge badge-primary">{{$curso['value']}}</span></h4>
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