<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logoF.png')}}" alt="Logo de la empresa" width="30" height="30" class="d-inline-block align-top">
                nventSmell
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('inicio')}}">Inicio</a>
                    </li>
                    @auth
                        

                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('catalogo.index')}}">Catalogo</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('product.index')}}"id="">Productos</a>
                    </li>
                {{--     <li class="nav-item">
                        <a class="nav-link" href="">Temporadas</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contactanos')}}">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pago')}}">Forma de pago</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('carritoC')}}" ><i class="fas fa-shopping-cart"></i> Carrito</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
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
</body>
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
</html>