<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('IMG')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Libre+Baskerville&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    @yield('head')
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{asset('inicio')}}" id="inv">
                <img src="{{asset('img/logoF.png')}}" alt="Logo de la empresa" width="30" height="30" class="d-inline-block align-top">nventSmell
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item @if(request()->is('inicio')) active @endif">
                        <a class="nav-link @if(request()->is('inicio')) active-link @endif" href="{{ route('inicio') }}">Inicio</a>
                    </li>
                    
                    @auth

                    <li class="nav-item @if(request()->is('catalogo')) active @endif">
                        <a class="nav-link @if(request()->is('catalogo')) active-link @endif" href="{{ route('catalogo.index') }}">Catalogo</a>
                    </li>

                  
                    <li class="nav-item @if(request()->is('product*')) active @endif">
                        <a class="nav-link @if(request()->is('product*')) active-link @endif" href="{{ route('product.index') }}">Productos</a>
                    </li>
                    
                    <li class="nav-item @if(request()->is('conocenos')) active @endif">
                        <a class="nav-link @if(request()->is('conocenos')) active-link @endif" href="{{ route('conocenos') }}">Conocenos</a>
                    </li>
                    
                    <li class="nav-item @if(request()->is('contactanos')) active @endif">
                        <a class="nav-link @if(request()->is('contactanos')) active-link @endif" href="{{ route('contactanos') }}">Contacto</a>
                    </li>
                    
                    <li class="nav-item @if(request()->is('perfil')) active @endif">
                        <a class="nav-link @if(request()->is('perfil')) active-link @endif" href="{{ route('perfil') }}">Perfil</a>
                    </li>
                    
                  
                    <li class="nav-item @if(request()->is('carritoC')) active @endif">
                        <a class="nav-link @if(request()->is('carritoC')) active-link @endif" href="{{ route('carritoC') }}"><i class="fas fa-shopping-cart"></i> Carrito</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle @if(request()->is('temporada*') || request()->is('pago')) active @endif" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cruds
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item @if(request()->is('temporada*')) active-link @endif" href="{{route('temporada.create')}}">Temporada</a>
                            <a class="dropdown-item @if(request()->is('pago')) active-link @endif" href="{{route('pago')}}">Forma de pago</a>
                        </div>
                    </li>
                    
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"id="loginLink">Iniciar sesión</a>
                    </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('loginDestroy')}}" id="logoutLink" >Cerrar sesión</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    
    @yield('content')

    <footer>
        <div class="container__footer">
            <div class="box__footer">
                <div class="logo">
                    <img src="{{asset('img/logoF.png')}}" alt="">
                </div>
                <div class="terms">
                    <h3 class="inv">InventSmell</h3>
                    <p>Inventa el aroma de tus sueños</p>
                    <p>Somos una empresa comprometida con nuestros usuarios y su satisfaccion</p>    
                </div>
            </div>
            <div class="box__footer">
                <h2>Soluciones</h2>
                <a href="https://www.google.com">App Desarrollo</a>
                <a href="#">App Marketing</a>
                <a href="#">IOS Desarrollo</a>
                <a href="#">Android Desarrollo</a>
            </div>

            <div class="box__footer">
                <h2>Empresa</h2>
                <a href="#">Acerca de</a>
                <a href="#">Trabajos</a>
                <a href="#">Procesos</a>
                <a href="#">Servicios</a>              
            </div>

            <div class="box__footer">
                <h2>Redes Sociales</h2>
                <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
                <a href="#"><i class="fab fa-twitter-square"></i> Twitter</a>
                <a href="#"><i class="fab fa-linkedin"></i> Linkedin</a>
                <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
            </div>
        </div>

        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2023 <b>InventSmell</b></p>
        </div>
    </footer>

<body>
    
</body>

<div class="login-status text-center">
  <p id="loginMessage"></p>
</div>


    
<!-- Enlaces a los scripts de Bootstrap y Font Awesome -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
  // Función para cambiar el estado de inicio de sesión
  function toggleLoginStatus(isLoggedIn) {
    if (isLoggedIn) {
      document.getElementById('loginLink').style.display = 'none';
      document.getElementById('logoutLink').style.display = 'block';
      document.getElementById('loginMessage').textContent = '¡Has iniciado sesión!';
    } else {
      document.getElementById('loginLink').style.display = 'block';
      document.getElementById('logoutLink').style.display = 'none';
      document.getElementById('loginMessage').textContent = 'Por favor, inicia sesión.';
    }
  }

  // Evento para cambiar el estado de inicio de sesión al hacer clic en "Cerrar sesión"
  document.getElementById('logoutLink').addEventListener('click', function() {
    toggleLoginStatus(false);
  });

  // Evento para cambiar el estado de inicio de sesión al hacer clic en "Iniciar sesión"
  document.getElementById('loginLink').addEventListener('click', function() {
    toggleLoginStatus(true);
  });
</script>
</body>
</html>