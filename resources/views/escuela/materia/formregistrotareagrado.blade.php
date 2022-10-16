<p class="hq text-center">NUEVO CUADRO</p>


<form action="{{route('notaFinal.store')}}" method="post">
   @csrf

   <input type="hidden" value="{{$data->id}}" name="materia_id">
   <input type="hidden" value="{{$data->grado_id}}" name="grado_id">

   <div class="form-group">
      <label for="">NOMBRE</label>
      <input type="text" class="form-control" name="nombre">
   </div>

   <div class="form-group">
      <label for="">VALOR DE NOTA FINAL</label>
      <input type="text" class="form-control" name="valor">
   </div>

   <div class="form-group">
      <label for="">FECHA DE ENTREGA</label>
      <input type="date" class="form-control" name="entrega">
   </div> 

   <div class="form-group">
      <label for="">BLOQUE</label>
      <select class="form-control" name="bloque">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
      </select>
   </div>

   <div class="form-group">
      <label for="">ESTADO</label>
      <select class="form-control" name="estado">
         <option value="activo">activo</option>
         <option value="inactivo">inactivo</option>
      </select>
   </div>

   <button type="submit" class="btn btn-primary"><i class="fas fa-save    "></i>GUARDAR</button>

</form>