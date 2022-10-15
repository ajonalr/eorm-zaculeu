@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="{{asset('plugins/datatable/css/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card mb-4">
                <div class="card-body">

                    <div class="d-flex justify-content-sm-between">
                        <h3 class="card-title">Listado de Estudientes</h3>

                        <div class=""><a class="btn btn-primary" href="{{route('estu.inscribir')}}"> <i class="fa fa-plus" aria-hidden="true"></i> Registrar Estudiante</a></div>
                    </div>

                    <div class="table-responsive   mb-5">

                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>APELLIDO</th>
                                    <th>CUI</th>
                                    <th>TELEFONO</th>
                                    <th>GRADO</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{$d->nombre}}</td>
                                    <td>{{$d->apellido}}</td>
                                    <td>{{$d->cui}}</td>
                                    <td>{{$d->telefono}}</td>
                                    <td>{{$d->grado->nombre}}, Seccio: {{$d->grado->seccion}}</td>
                                    <td></td>
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