@extends('layouts.formulario')

@section('content')
    <div class="container">
        
            <h1 class="mb-3">Carrito de compra</h1>

            <form action="{{ route('shoppingCart.store') }}" method="POST">

                @csrf
                <div class="mb-3">



                    <div class="mb-3">
                        <select name="idUser" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="input-field select-field">
                        <label for="archivo" class="form-label">Producto:</label>
                        <select name="idProduct" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->id }} {{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="archivo" class="form-label">Cantidad:</label>
                        <input type="number" name="product_quantity">
                    </div>


                    <div class="btn-field">
                        <button type="submit" class="btn btn-primary">Enviar</i></button>
                    </form>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
