@extends('layouts.profesor')


@section('content')
<div class="container mt-4">
   <div class="row">
      <div class="col">

         <div class="card border-info">
            <img class="card-img-top" src="holder.js/100px180/" alt="">
            <div class="card-body">
               <h4 class="card-title">TAREAS REGISTRADAS</h4>

        
               <form action="">
                  <div class="form-group">
                     <label for="">BIMESTRE</label>
                     <select class="form-control" name="bimestre" id="">
                        <option value="1">1 (bimestre)</option>
                        <option value="2">2 (bimestre)</option>
                        <option value="3">3 (bimestre)</option>
                        <option value="4">4 (bimestre)</option>
                     </select>
                  </div>
                  <button type="submit" class="btn btn-success">BUSCAR</button>
               </form>
               

               @if ($vis2)
               <form action="">
                  <div class="form-group">
                     <label for="">TAREA</label>
                     <select class="form-control" name="nota_final_id" id="">
                      @foreach ($tareas as $t)
                         <option value="{{$t->nombre}}">{{$t->nombre}}</option>
                      @endforeach
                     </select>
                  </div>
                  <button type="submit" class="btn btn-success">BUSCAR</button>
               </form>
               @endif

            </div>
         </div>
      </div>
   </div>
</div>

@endsection