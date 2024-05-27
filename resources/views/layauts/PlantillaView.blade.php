<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ secure_asset ('fonts/icomoon/style.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ secure_asset ('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ secure_asset ('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset ('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset ('css/owl.theme.default.min.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('css/jquery.fancybox.min.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('css/bootstrap-datepicker.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('fonts/flaticon/font/flaticon.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('css/aos.css')}}">
  
    <link rel="stylesheet" href="{{ secure_asset ('css/style.css')}}">
    
</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a  class="navbar-brand ms-3 text-light " href="{{route('general.inicio')}}">Inicio</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class=" text-light nav-item nav-link active" href="{{route('docentes')}}">Docentes <span class="sr-only"></span></a>
            <a class=" text-light nav-item nav-link" href="{{route('sedes')}}">Sedes</a>
            <a class=" text-light nav-item nav-link" href="{{route('usuarios')}}">Alumnos</a>
            <a class=" text-light nav-item nav-link" href="{{route('material.index')}}">Materiales</a>
            <a class=" text-light nav-item nav-link" href="{{route('campo.index')}}">Campos</a>
            <a class=" text-light nav-item nav-link" href="{{route('clase.index')}}">Clases</a>
            <a class=" text-light nav-item nav-link" href="#">Eventos</a>
            
          </div>
        </div>
      </div>
        
      </nav> 

      

      <div class="container">
        @yield('content')
      </div>
   
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
    <script src="{{ secure_asset('js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery-ui.js')}}"></script>
  <script src="{{ secure_asset ('js/popper.min.js')}}"></script>
  <script src="{{ secure_asset ('js/bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset ('js/owl.carousel.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.stellar.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.countdown.min.js')}}"></script>
  <script src="{{ secure_asset ('js/bootstrap-datepicker.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.easing.1.3.js')}}"></script>
  <script src="{{ secure_asset ('js/aos.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.fancybox.min.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.sticky.js')}}"></script>
  <script src="{{ secure_asset ('js/jquery.mb.YTPlayer.min.js')}}"></script>


  <script src="js/main.js"></script>
</body>
</html>