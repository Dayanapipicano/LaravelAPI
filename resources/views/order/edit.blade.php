@extends('layouts.plantilla')

@section('content')

    <div class="container">
        <div class="form-content">
            <h1 class="mt-4">Pedido</h1>

            <form action="{{ route('order.update', $order) }}" method="POST">

                @csrf
                @method('put')
                <div class="mb-3">

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Fecha de Pedido:</label>
                        <input type="date" name="dateOrder" value="{{ $order->dateOrder }}">
                    </div>

                    <div class="mb-3">
                        <select name="idShoppingCart" value="{{ $order->idShoppingCart }}" class="styled-select">
                            @foreach ($shoppingCarts as $shoppingCart)
                                <option value="{{ $shoppingCart->id }}">{{ $shoppingCart->id }} {{ $shoppingCart->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                      <button  class="btn btn-primary" type="submit">Enviar</button>
                  </div>
                </div>
            </form>
        </div>
    </div>
@endsection
