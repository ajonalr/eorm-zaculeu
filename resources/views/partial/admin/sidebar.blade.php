        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span class="hide-menu">Dashboard</span></li>



                        <div class="dropdown open">
                            <a class="btn btn-secondary dropdown-toggle" type="button" id="GRADOS" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Grados
                            </a>
                            <div class="dropdown-menu" aria-labelledby="GRADOS">
                                <a class="dropdown-item" href="">LISTADO</a>


                                @foreach (getGradosAll() as $g)
                                <a class="dropdown-item" href="{{route('grado.show', $g->id)}}">{{$g->nombre}} / Seccion: {{$g->seccion}}</a>
                                @endforeach


                                <a class="dropdown-item" href="{{route('grado.create')}}">Registro</a>
                            </div>
                        </div>

                        <div class="dropdown open">
                            <a class="btn btn-secondary dropdown-toggle" type="button" id="profesor_dia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                maestros
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profesor_dia">
                                <a class="dropdown-item" href="{{route('profe.index')}}">LISTADO</a>
                                <a class="dropdown-item" href="{{route('profe.grado_profesor_view')}}">Asignar Grado</a>
                                <a class="dropdown-item" href="{{route('profe.create')}}">Registro</a>
                            </div>
                        </div>

                       

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="MATERIAGRADOgAS" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                MATERIAS
                            </button>
                            <div class="dropdown-menu" aria-labelledby="MATERIAGRADOgAS">
                                <a class="dropdown-item" href="{{route('materiaG.index')}}">LISTADO</a>
                                <a class="dropdown-item" href="{{route('materiaG.create')}}">Registro</a>
                                <a class="dropdown-item" href="#">Reportes</a>

                            </div>
                        </div>



                        @can('admin_panel_access')
                        <!-- dashboard-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin')) is_active @endif" href="{{ route('home') }}" aria-expanded="false">
                                <i class="mr-3 fas fa-tachometer-alt fa-fw" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @endcan


                        @canany(['users_access','roles_access','permissions_access'])
                        <li class="sidebar-item">

                            <a class="sidebar-link has-arrow waves-effect waves-dark selected" href="javascript:void(0)" aria-expanded="false">

                                <i class="mr-3 mdi mdi-account" aria-hidden="true"></i>
                                <span class="hide-menu">Users Management</span>
                            </a>
                            <ul aria-expanded="false" class="collapse first-level
                                @if(request()->is('admin/users') || request()->is('admin/users/*')) in @endif
                                @if(request()->is('admin/roles') || request()->is('admin/roles/*')) in @endif
                                @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) in @endif
                            ">
                                @can('users_access')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/users') || request()->is('admin/users/*')) is_active @endif" href="" aria-expanded="false">
                                        <i class="mr-3 mdi mdi-account-multiple" aria-hidden="true"></i>
                                        <span class="hide-menu">Users</span>
                                    </a>
                                </li>
                                @endcan

                                @can('roles_access')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/roles') || request()->is('admin/roles/*')) is_active @endif" href="" aria-expanded="false">
                                        <i class="mr-3 mdi mdi-star" aria-hidden="false"></i>
                                        <span class="hide-menu">Roles</span>
                                    </a>
                                </li>
                                @endcan

                                @can('permissions_access')
                                <li class="sidebar-item">
                                    <a class="sidebar-link waves-effect waves-dark  @if(request()->is('admin/permissions') || request()->is('admin/permissions/*')) is_active @endif" href="" aria-expanded="false">
                                        <i class="mr-3 mdi mdi-key" aria-hidden="false"></i>
                                        <span class="hide-menu">Permissions</span>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->