@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Carrito de compra</h1>

            <form action="{{ route('shoppingCart.update', ['shoppingCart' => $shoppingCart->id]) }}" method="POST">

                @csrf
                @method('put')
                <div class="mb-3">


                    <div class="mb-3">
                        <select name="idUser" value="{{ $shoppingCart->idUser }}" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-field select-field">
                        <label for="archivo" class="form-label">Producto:</label>
                        <select name="idProduct" value="{{ $shoppingCart->idProduct }}" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->id }} {{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Cantidad:</label>
                        <input type="number" name="product_quantity" value="{{ $shoppingCart->product_quantity }}">
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary"type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
