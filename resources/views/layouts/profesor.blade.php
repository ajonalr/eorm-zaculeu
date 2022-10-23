<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="robots" content="noindex,nofollow">
   <title>{{config('app.name')}}</title>
   <link rel="stylesheet" href="{{asset('plugins/bootstrap/bootstrap2.min.css')}}">
   @yield('styles')
</head>

<body>


   <nav class="navbar navbar-expand-lg navbar-dark bg-primary p-4 mb-4">
      <a class="navbar-brand" href="{{route('profe.home')}}">{{config('app.name')}}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
               <a class="nav-link" href="#">
                  PERFIL
                  <span class="sr-only">
                     <?php echo session()->get('profe')['nombre']; ?>
                  </span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">CALIFICAR</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  GRADOS ASIGANADOS
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach (getGradosToProfesor(session()->get('profe_id')) as $grados )
                  <a class="dropdown-item" href="{{route('profe.getGradoProfe', ['grado_id' => $grados->grado->id, 'profe_id'=> $grados->profesor_id])}}">{{$grados->grado->nombre}}, {{$grados->grado->seccion}}</a>
                  @endforeach

               </div>
            </li>

         </ul>



      </div>
   </nav>


   @yield('content')



   <script src="{{asset('plugins/bootstrap/jquery.min.js')}}"></script>
   <script src="{{asset('plugins/bootstrap/popper.min.js')}}"></script>
   <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

   @yield('scripts')

</body>

</html>