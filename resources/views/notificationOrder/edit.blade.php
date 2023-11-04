@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Notificacion Pedido</h1>

            <form action="{{ route('notificationOrder.update', $notificationOrder) }}" method="POST">

                @csrf
                @method('put')
                <div class="input-group">

                    <div class="input-field">
                        <input type="text" name="mensaje" value="{{ $notificationOrder->mensaje }}">
                    </div>

                    <div class="input-field select-field">
                        <select name="idOrder" value="{{ $notificationOrder->idOrder }}" class="styled-select">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }} {{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="btn-field">
                        <button id="singUp" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
