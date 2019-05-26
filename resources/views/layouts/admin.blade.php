<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GP14Airland</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content="all,follow">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('admin/css/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Favicon-->

  </head>
  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">
            <h5>Administración</h5><span>GP14Airland</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>G</strong><strong class="text-primary">P</strong><strong>14</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">     
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#user" aria-expanded="false" aria-controls="user">
                <i class="fas fa-users"></i>
                <span>Usuarios</span></a>
            </li>             
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#flight" aria-expanded="false" aria-controls="flight">
                <i class="fas fa-fw fa-plane"></i>
                <span>Aéreo</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#housing" aria-expanded="false" aria-controls="housing">
                <i class="fas fa-fw fa-building"></i>
                <span>Alojamiento</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#transport" aria-expanded="false" aria-controls="transport"> 
                <i class="fas fa-fw fa-car"></i>
                <span>Transporte</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#insurance" aria-expanded="false" aria-controls="insurance"> 
                <i class="fas fa-heartbeat"></i>
                <span>Seguros</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" data-target="#package" aria-expanded="false" aria-controls="package"> 
                <i class="fas fa-cubes"></i>
                <span>Paquetes</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="fas fa-bars"></i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong>Tablero de Administración</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item">
                  <li>
                    <a href="/admin" class="nav-link logout" style="font-size: 14px;" target="_blank" rel="noopener noreferrer">
                      Inicio
                      <i class="fas fa-home"></i>
                    </a>
                  </li>
                  <li>
                    <a href="/" class="nav-link logout" style="font-size: 14px;" target="_blank" rel="noopener noreferrer">
                      Ver su página
                      <i class="fas fa-eye"></i>
                    </a>
                  </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link logout" style="font-size: 16px;" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Salir') }}
                      <i class="fas fa-sign-out-alt"></i>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

    <main>
        @yield('content')
    </main>
      
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>&copy; 2019 GP14LATAM</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Departamento de Ingeniería en Informática - Universidad de Santiago de Chile, Santiago de Chile</a></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('template/lib/jquery/jquery.min.js') }}"defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('template/lib/jquery.cookie/jquery.cookie.js') }}" defer></script>
    <script src="{{ asset('template/lib/jquery-validation/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('template/lib/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}" defer></script>
    <!-- Main File-->
    <script src="{{ asset('admin/js/front.js') }}"defer></script>

  </body>
</html>

