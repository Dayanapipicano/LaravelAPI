@extends('layouts.formulario')

@section('content')
@include('layouts.head')
    <div class="container">
        
            <h1 class="mt-4">Pedido</h1>

            <form action="{{ route('order.store') }}" method="POST">

                @csrf
                <div class="mb-3">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Fecha de Pedido:</label>
                        <input type="date" name="dateOrder" placeholder="fecha de orden">
                    </div>

                    <div class="mb-3">
                        <select name="idShoppingCart" class="form-control">
                            @foreach ($shoppingCarts as $shoppingCart)
                                <option value="{{ $shoppingCart->id }}">{{ $shoppingCart->id }} {{ $shoppingCart->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar</i></button>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection
