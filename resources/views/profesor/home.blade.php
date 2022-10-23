@extends('layouts.profesor')

@section('content')

<div class="container-fluid">
   <div class="row">
      <div class="col">

         <pre>


      Profe id:    {{session()->get('profe_id')}}
         Nombre profe: {{session()->get('profe')['nombre']}}

      </pre>


      </div>
   </div>
</div>

@endsection