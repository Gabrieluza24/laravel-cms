

<body class="animsition">
    @include('sweet::alert')

    <div class="page-wrapper">
 
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="/">
                    <span> Suministro de Gasolina </span>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="/personas">
                            <i class="fas fa-user"></i>Perfil de Usuario</a>
                        </li>
                        @can('users.index')
                        <li>
                            <a href="/user">
                            <i class="fas fa-users"></i>Gestion de Usuarios</a>
                        </li>
                        @endcan
                        @can('solicitudes.index')
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>Solicitudes</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @can('solicitudes.store')
                            <li>
                                <a href="{{ route('solicitudes.create')}}">Nueva Solicitud</a>
                            </li>
                            @endcan
                            @can('solicitudes.destroy')
                            <li>
                                <a href="/solicitudes">Consultar Solicitudes</a>
                            </li>
                            @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('solicitudes.show')
                        <li>
                            <a href="{{ route('solicitudes.show', 'consulta')}}">
                            <i class="fas fa-desktop"></i>Solicitudes</a>
                        </li>
                        @endcan
                        @can('cars.index')
                        <li class="has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-car"></i>Automoviles</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            @can('cars.store')
                            <li>
                                <a href="/cars">Gestion de Automoviles</a>
                            </li>
                            @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('cars.show')
                        <li>
                            <a href="{{ route('cars.show', 'consulta')}}">
                            <i class="fas fa-car"></i>Automoviles</a>
                        </li>
                        @endcan
                        @can('estacionservicio.index')
                        <li>
                            <a href="/estaciones">
                                <i class="fas fa-fire"></i>Estaciones de Servicio</a>
                        </li>
                        @endcan
                        @can('transportes.index')
                        <li>
                            <a href="/transportes">
                                <i class="fas fa-truck"></i>Transporte</a>
                        </li>
                        @endcan
                        @can('gestiones.index')
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cog"></i>Gestiones</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('gestiones.create')}}">Nuevo Despacho</a>
                            </li>
                            <li>
                                <a href="/gestiones">Asignacion de Combustible</a>
                            </li>
                            
                            </ul>
                        </li>
                        @endcan
                        @can('success.index')
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-line-chart"></i>Informes</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="/success">Consultar Asignaciones</a>
                            </li>
                        </ul>
                        </li>
                        @endcan
                        
                    </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" style="float:right" href="#">{{ Auth::user()->name }} {{ Auth::user()->lastname }}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <span class="email">{{ Auth::user()->email }}</span>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                    <i class="zmdi zmdi-power"></i>{{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                </div>
                            </div>
                        </div>
