@extends('layouts.admin')


@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <div class="card">
            <div class="card-body">
               <h4 class="card-title">MATERIAS REGISTRADAS</h4>
               <div class="table-responsive   mb-5">
                  <table class="table" id="table_id">
                     <thead>
                        <tr>
                           <th>NOMBRE</th>
                           <th>GRADO</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($data as $d)
                        <tr>
                           <td>{{$d->nombre}}</td>
                           <td>{{$d->grado->nombre}} / {{$d->grado->seccion}}</td>
                           <td>
                              <a class="btn btn-primary" href="{{route('materiaG.show', $d->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatable/js/dataTables.bootstrap4.min.js')}}"></script>

<script>
   $(document).ready(function() {
      $('#table_id').DataTable({
         "language": {
            'info': '_TOTAL_ REGISTROS',
            'search': 'BUSCAR',
            'paginate': {
               'next': 'SIGUIENTE',
               'previous': 'ATRAS'
            },
            'loadingRecords': 'CARGANDO',
            'emptyTable': 'NO EXISTEN DATOS',
            'zeroRecords': 'NO EXISTEN DATOS IGUALES'
         }
      });
   });
</script>
@endsection