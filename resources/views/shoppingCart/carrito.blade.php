@extends('layouts.plantilla')

@section('title', 'Mi carrito')

@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
@endsection

@section('content')
<section class="cart-section">
  <div class="btnCarrito">
    <a href="{{route('catalogo.index')}}"><button  class="btn btn-primary">Continuar Comprando</button></a>
  </div>
    <div class="container">
        <div class="cart-items">
            <?php $pedido = 0 ?>
            @foreach($shoppingCart as $shoppingCartItem)
                <div class="cart-item">
                    <img src="{{ asset('storage/product/' . $shoppingCartItem->product->image) }}" class="img-producto">
                    <div>
                        <h4 class="cart-item-title">{{ $shoppingCartItem->product->name }}</h4>
                        <p class="precio">Precio del producto: {{ $shoppingCartItem->product->price }}</p>
                        <p>cantidad de productos: {{ $shoppingCartItem->product_quantity }}</p>

                        <?php 
                            $valor1 = intval($shoppingCartItem->product->price);
                            $valor2 = intval($shoppingCartItem->product_quantity);
                            $precioF = $valor1 * $valor2;
                            $pedido = $precioF + $pedido;
                        ?>
                        <p>Precio: {{ $precioF }}</p>
                        
                        <form action="{{ route('shoppingCart.destroy', $shoppingCartItem->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">Eliminar</button>
                      </form>
                      
                      
                    </div>
                </div>
              
              
            @endforeach
            <h2>Total: ${{ $pedido }}</h2>
        </div>
    </div>
 
</section>
@endsection




























































        {{-- <div class="cart-item">
          <img src="{{asset('img/producto1.webp')}}" alt="Producto 2">
          <div>
            <h4 class="cart-item-title">Producto 2</h4>
            <p>Precio: $150</p>
            <button class="btn btn-danger">Eliminar</button>
          </div>
        </div>
        <div class="cart-item">
          <img src="{{asset('img/producto1.webp')}}" alt="Producto 3">
          <div>
            <h4 class="cart-item-title">Producto 3</h4>
            <p>Precio: $120</p>
            <button class="btn btn-danger">Eliminar</button>
          </div>
        </div> --}}