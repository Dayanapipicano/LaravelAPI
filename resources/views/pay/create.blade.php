@extends('layouts.formulario')

@section('content')
    <div class="container">
        
            <h1 class="mt-4">Pago</h1>

            <form action="{{ route('pay.store') }}" method="POST">

                @csrf
                <div class="mb-3">

                    <div class="mb-3">
                        <label for="concentracion" class="form-label">Pedido:</label>
                        <select name="idOrder" class="form-control">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }} {{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-field select-field">
                        <label for="concentracion" class="form-label">Tipo de pago:</label>
                        <select name="idTypePay" class="form-control">
                            @foreach ($typePays as $typePay)
                                <option value="{{ $typePay->id }}">{{ $typePay->id }} {{ $typePay->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar</i></button>
                    </div>
                </div>
            </form>
            
        </div>
    @endsection
