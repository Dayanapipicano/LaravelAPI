@extends('layouts.plantilla')

    @section('title','Contacto - Perfumería')
    
    @section('head')
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/catalogo.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Libre+Baskerville&family=Quicksand:wght@300&display=swap" rel="stylesheet">
    
@endsection()

@section('content')


    <title>Catálogo de Perfumes</title>

    @php
        $cardClasses = ['card1', 'card2'];
        $currentCardIndex = 0;
    @endphp


    <div class="containers mt-4">
        <h1 class="mb-4">Catálogo de Perfumes</h1>

        <div class="row">
            @foreach ($product as $products)
                <div class="col-md-4">

                    <div class="producto">
                        <a href="{{ route('product.show', ['id' => $products->id]) }}"
                            class="card {{ $cardClasses[$currentCardIndex] }}" data-card-index="{{ $products->id }}">
                            <img src="{{ $products->image }}" alt="Imagen">
                        </a>
                        <h3>{{ $products->name }}</h3>
                        <p><i class="fas fa-sun icono"></i>{{ $products->description }}</p>
                        <p><i class="fas fa-tint icono"></i>{{ $products->concentration }}</p>
                        <p class="precio">${{ $products->price }}</p>
                        <p class="temporada"><i class="fas fa-calendar-alt icono"></i>{{ $products->season->name }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>




@endsection()
