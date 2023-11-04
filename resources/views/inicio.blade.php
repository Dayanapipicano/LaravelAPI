@extends('layouts.plantilla')
@section('title', 'Inicio')
@section('head')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}">

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
@endsection()

@section('content')

    {{-- <pre>{{auth()->id()}}</pre> --}}

    <div class="container-fluid p-0">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('img/inicio3.jpg') }}" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/inicio1.jpg') }}" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('img/portada.jpg') }}" alt="Imagen 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Libre+Baskerville&family=Quicksand:wght@300&display=swap" rel="stylesheet">

    <section class="section">
      <div class="container">
        <h1 class="titulo1">Temporadas</h1>
        <div class="contenedor-tarjetas">
          <div class="contenedor-cart">
              <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
              
              
              <div class="card" id="cont">
                  <div class="overlay">
                      <h1>Invierno</h1>
                      <a href="{{ route('invierno') }}" class="btn">View Profile</a>
                  </div>
              </div>
  
            
              <div class="card" id="cont1">
                  <div class="overlay" >
                      <h1>Primavera</h1>
                      <a href="{{ route('primavera') }}" class="btn">View Profile</a>
                

                  </div>
              </div>
  
  
              
              <div class="card" id="cont2">
                  <div class="overlay">
                      <h1>Verano</h1>
                      <a href="{{ route('verano') }}" class="btn">View Profile</a>
                  </div>
              </div>
  
  
             
              <div class="card " id="cont3">
                
                  <div class="overlay">
                      <h1>Otoño</h1>
                      <a href="{{ route('otoño') }}" class="btn">View Profile</a>
                  </div>
                
              </div>
          </div>
      </div>
  
      </div>
    </section>

   
    </div>

@endsection()

</html>
