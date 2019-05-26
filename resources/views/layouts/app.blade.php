<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>G14Airland</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Template Style Files -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Libraries CSS Files -->
    <link rel="stylesheet" href="{{ asset('template/lib/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/lib/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/lib/magnific-popup/magnific-popup.css') }}">

    <!-- Rev slider css -->
    <link href="{{ asset('template/lib/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/revolution/css/navigation.css') }}" rel="stylesheet">
    <link href="{{ asset('template/lib/animate/animate.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

</head>
<body>
    <!--==========================
        Header
    ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="#intro" class="scrollto">GP14Airland</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                @guest  
                    <li class="menu-active"><a href="/#intro">Inicio</a></li>
                    <li><a href="/#about">Paquetes</a></li>
                    <li><a href="/#buy-forms">Servicios</a></li>
                    <li><a href="/#features">Vuelos</a></li>
                    <li><a href="/#pricing">Alojamiento</a></li>
                    <li><a href="/#more-features">Transporte</a></li>
                    {{-- <li><a href="/#gallery">Galería</a></li> --}}
                    {{-- <li><a href="/#contact">Contáctenos</a></li> --}}
                    <li><a class="nav-link page-scroll" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                    @if (Route::has('register'))
                        <li><a class="nav-link page-scroll" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                    @endif
                    @else
                        <li class="menu-active"><a href="/#intro">Inicio</a></li>
                        <li><a href="/#about">Paquetes</a></li>
                        <li><a href="/#buy-forms">Servicios</a></li>
                        <li><a href="/#features">Vuelos</a></li>
                        <li><a href="/#pricing">Alojamiento</a></li>
                        <li><a href="/#more-features">Transporte</a></li>
                        {{-- <li><a href="/#gallery">Galería</a></li> --}}
                        {{-- <li><a href="/#contact">Contáctenos</a></li> --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <i class="fas fa-caret-down"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" style="background: linear-gradient(45deg, #1de099, #1dc8cd) !important;" aria-labelledby="navbarDropdown">
                                @if (Auth::user()->is_admin == 1)
                                    <a class="dropdown-item" href="/admin"  method="post">
                                        {{ __('Administración') }}
                                        <i class="fas fa-user-tie"></i>
                                    </a>
                                @endif
                                <a class="dropdown-item" href="{{ route('profile.show',[Crypt::encrypt(Auth::user()->id) ])}}"  method="post">
                                    {{ __('Perfil') }}
                                    <i class="fas fa-user"></i>
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                        <i class="fas fa-sign-out-alt"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                @endguest
                <li>
                    <a href="{{ route('cart.index') }}"><i class="fas fa-shopping-cart" style="font-size: 22px;"></i><span class="cart-count">
                        @if (Cart::instance('default')->count() > 0)
                        <span>{{ Cart::instance('default')->count() }}</span></span>
                        @endif
                    </a>
                </li>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- #header -->

    <!-- Main Section-->
    <div class="main" id="main"
        style="
        background-size: cover !important;
        background: linear-gradient(rgba(29, 200, 205, 0),
        rgba(29, 205, 89, 0.2)),
        url('{{ asset('template/img/call-to-action-bg.jpg') }}'),
        fixed center center;">
            @yield('content')
    </div>
    <!-- End Main Section-->

    <!--==========================
    Contact Section
    ============================-->
    <section id="contact">
        <div class="container">
            <div class="row wow fadeInUp">

            <div class="col-lg-4 col-md-4">
                <div class="contact-about">
                <h3>GP14LATAM</h3>
                <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                <div class="social-links">
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="info">
                <div>
                    <i class="ion-ios-location-outline"></i>
                    <p>A108 Adam Street<br>New York, NY 535022</p>
                </div>

                <div>
                    <i class="ion-ios-email-outline"></i>
                    <p>contacto@rollers.cl</p>
                </div>

                <div>
                    <i class="ion-ios-telephone-outline"></i>
                    <p>+56 9 4272 3136</p>
                </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>
                <form action="" method="post" role="form" class="contactForm">
                    <div class="form-row">
                    <div class="form-group col-lg-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group col-lg-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                        <div class="validation"></div>
                    </div>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                    </div>
                    <div class="text-center"><button type="submit" title="Send Message">Enviar Mensaje</button></div>
                </form>
                </div>
            </div>

            </div>

        </div>
    </section><!-- #contact -->

    <!--==========================
        Footer
    ============================-->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-lg-left text-center">
                <div class="copyright">
                    &copy; Copyright <strong>GP14LATAM</strong>. Todos los derechos reservados
                </div>
                <div class="credits" style="font-size:7px !important;">
                    <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Avilon
                    -->
                    Diseñado en primera instancia por <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
                </div>
                <div class="col-lg-6">
                    <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                        <a href="/#intro" class="scrollto">Inicio</a>
                        <a href="/#about" class="scrollto">Paquetes</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="{{ asset('js/app.js') }}"defer></script>

    <!-- JavaScript Libraries -->
    <script src="{{ asset('template/lib/jquery/jquery.min.js') }}"defer></script>
    <script src="{{ asset('template/lib/jquery/jquery-migrate.min.js') }}"defer></script>
    <script src="{{ asset('template/lib/easing/easing.min.js') }}"defer></script>
    <script src="{{ asset('template/lib/wow/wow.min.js') }}"defer></script>
    <script src="{{ asset('template/lib/superfish/hoverIntent.js') }}"defer></script>
    <script src="{{ asset('template/lib/superfish/superfish.min.js') }}"defer></script>
    <script src="{{ asset('template/lib/magnific-popup/magnific-popup.min.js') }}"defer></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('template/js/main.js') }}"defer></script>
</body>
</html>
