@extends('layouts.plantilla')

@section('head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Perfumería</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="{{asset('css/login2.css')}}">
@endsection()
@section('title','Login')

@section('content')
<div class="body">
  <div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="{{asset('img/logo.jpeg')}}" alt="Logo de Perfumería" class="perfume-image">
            <h2 class="mb-4">¡Bienvenido a nuestra Perfumería!</h2>
            <form method="POST" action="{{ route('loginValidation') }}">
              @csrf 
              <form>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Correo Electrónico" name="email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Contraseña" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block btn-login">Iniciar Sesión</button>
            </form>
            <div class="mt-3">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="mt-3">
                <span>¿No tienes una cuenta?</span>
                <a href="{{route('user.create')}}" class="register-link">Regístrate aquí</a>
            </div>
            <div class="social-buttons mt-4">
                <span class="social-button">
                    <i class="fab fa-facebook-f social-icon"></i>
                </span>
                <span class="social-button">
                    <i class="fab fa-google social-icon"></i>
                </span>
                <span class="social-button">
                    <i class="fab fa-twitter social-icon"></i>
                </span>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
@endsection()

