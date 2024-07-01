<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingresar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <header class="site-navbar py-4" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="index.html">
                        <img src="images/logo.png" alt="Logo">
                    </a>
                </div>
                <div class="ml-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="{{ route('general.inicio') }}" class="nav-link">Inicio</a></li>
                            <li><a href="{{ route('general.partidos') }}" class="nav-link">Partidos</a></li>
                            <li><a href="{{ route('general.jugadores') }}" class="nav-link">Jugadores</a></li>
                            <li><a href="{{ route('general.contacto') }}" class="nav-link">Contacto</a></li>
                            <li><a href="{{ route('login') }}" class="nav-link">Ingresar</a></li>
                        </ul>
                    </nav>

                    <a href="#"
                        class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                            class="icon-menu h3 text-white"></span></a>
                </div>
            </div>
        </div>

    </header>
    


    <div class="hero overlay" style="background-image: url('images/bg_3.jpg');">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-9 mx-auto text-center rounded-2 p-3" style="background-color: rgba(0, 0, 0, 0.5);">
                <h2>Login</h2>
                <form action="{{ route('loginauth') }}" method="POST">
                    @csrf
                    
                    <div class="form-group row m-3">
                        <label for="email" class="col-sm-2 col-form-label">Correo </label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" type="email" value="{{ old('email') }}">
                        </div>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
        
                    <div class="form-group row m-3">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" id="" value="{{ old('password') }}">
                        </div>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
        
                    <button class="btn btn-outline-primary m-2" type="submit">Ingresar</button>
                </form>
            </div>
          </div>
        </div>
      </div>



    {{-- <div class="container">
        <h1>Login</h1>
        <form action="{{ route('login.postlogin') }}" method="POST">
            @csrf
            
            <div class="form-group row m-3">
                <label for="email" class="col-sm-2 col-form-label">Correo </label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" type="email" value="{{ old('email') }}">
                </div>
                @error('email')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group row m-3">
                <label for="password" class="col-sm-2 col-form-label">Contraseña </label>
                <div class="col-sm-10">
                    <input class="form-control" type="password" name="password" id="" value="{{ old('password') }}">
                </div>
                @error('password')
                    {{ $message }}
                @enderror
            </div>

            <button class="btn btn-outline-primary m-2" type="submit">Entrar</button>
        </form>
    </div> --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.mb.YTPlayer.min.js"></script>


    <script src="js/main.js"></script>
</body>

</html>
