<nav class="pcoded-navbar">
   <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
   <div class="pcoded-inner-navbar main-menu">
      <div class="mb-4">
         <div class="main-menu-header">
            <img class="img-80 img-radius" src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="User-Profile-Image">
            <div class="user-details">
               <span id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></span>
            </div>
         </div>

         <div class="main-menu-content">
            <ul>
               <li class="more-details">
                  <form action="{{route('logout')}}" method="post">
                     @csrf
                     <button type="submit" class="btn btn-primary">CERRAR SESION</button>
                  </form>
               </li>
            </ul>
         </div>
      </div>

      <div class="pcoded-navigation-label" data-i18n="nav.category.forms">MENU &amp; </div>


      <ul class="pcoded-item pcoded-left-item">
         <li>
            <a href="{{route('home')}}" class="waves-effect waves-dark">
               <span class="pcoded-micon"> <i class="fa fa-home" aria-hidden="true"></i> <b>CASA</b></span>
               <span class="pcoded-mtext" data-i18n="nav.form-components.main">CASA</span>
               <span class="pcoded-mcaret"></span>
            </a>
         </li>

         <li>
            <a href="{{route('estu.inscribir')}}" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-user-plus" aria-hidden="true"></i><b>INC</b></span>
               <span class="pcoded-mtext" data-i18n="nav.form-components.main">INSCRIBIR</span>
               <span class="pcoded-mcaret"></span>
            </a>
         </li>

         <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.main">ESTUDIANTE</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="{{route('estu.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">INICIO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('estu.inscribir')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">INSCRIBIR</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('bole.boletines')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">BOLETINES</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('estu.reportes')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">REPORTES</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
            </ul>
         </li>

         <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.main">GRADOS</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="{{route('grado.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">INICIO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>

               <li class=" ">
                  <a href="{{route('grado.create')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">REGISTRO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               @foreach (getGradosAll() as $g)
               <li class=" ">
                  <a href="{{route('grado.show', $g->id)}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">{{$g->nombre}} / Seccion: {{$g->seccion}}</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               @endforeach
            </ul>
         </li>

         <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.main">MAESTROS</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="{{route('profe.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">INICIO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('profe.create')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">REGISTRO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('profe.grado_profesor_view')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ASIGNAR GRADO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
            </ul>
         </li>

         <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.main">MATERIAS</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="{{route('materiaG.index')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">INICIO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{route('materiaG.create')}}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">REGISTRO</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="#" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">REPORTES</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
            </ul>
         </li>


         <li class="pcoded-hasmenu">
            <a href="javascript:void(0)" class="waves-effect waves-dark">
               <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
               <span class="pcoded-mtext" data-i18n="nav.basic-components.main">USUARIOS</span>
               <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">
               <li class=" ">
                  <a href="{{ route('users.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">USUARIOS</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{ route('roles.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">ROLES</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
               <li class=" ">
                  <a href="{{ route('permissions.index') }}" class="waves-effect waves-dark">
                     <span class="pcoded-micon"><i class="fa fa-arrow-circle-down" aria-hidden="true"></i></span>
                     <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">PERMISOS</span>
                     <span class="pcoded-mcaret"></span>
                  </a>
               </li>
            </ul>
         </li>



      </ul>

   </div>
</nav>