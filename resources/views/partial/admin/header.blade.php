<nav class="navbar header-navbar pcoded-header">
   <div class="navbar-wrapper">
      <div class="navbar-logo">
         <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
            <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
         </a>
         <div class="mobile-search waves-effect waves-light">
            <div class="header-search">
               <div class="main-search morphsearch-search">
                  <div class="input-group">
                     <span class="input-group-addon search-close"><i class="fas fa-door-closed    "></i></span>
                     <input type="text" class="form-control" placeholder="Enter Keyword">
                     <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                  </div>
               </div>
            </div>
         </div>
         <a href="{{route('home')}}">
            <img class="img-fluid" src="{{asset('logos/logo.png')}}" style="width: 28%;
    border-radius: 51px;" alt="Theme-Logo" />
         </a>
         <a class="mobile-options waves-effect waves-light">
            <i class="fa fa-bars" aria-hidden="true"></i>
         </a>
      </div>

      <div class="navbar-container container-fluid">
         <ul class="nav-left">
            <li>
               <div class="sidebar_toggle">
                  <a href="javascript:void(0)">
                     <i class="fas fa-bars    "></i>
                  </a>
               </div>
            </li>

            <li>
               <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                  <i class="fa fa-expand" aria-hidden="true"></i>
               </a>
            </li>
         </ul>
         <ul class="nav-right">

            <li class="user-profile header-notification">
               <a href="#!" class="waves-effect waves-light">
                  <img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" class="img-radius" alt="User-Profile-Image">
                  <span>{{Auth::user()->name}}</span>
                  <i class="fa fa-arrow-down" aria-hidden="true"></i>
               </a>
               <ul class="show-notification profile-notification">
                  <li class="waves-effect waves-light">
                     <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">CERRAR SESION</button>
                     </form>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</nav>