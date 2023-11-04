@extends('layouts.plantilla')
@section('content')
    <div class="container">
        <div class="form-content">
            <h1 class="mt-4">Pago</h1>

            <form action="{{ route('pay.update', $pay) }}" method="POST">

                @csrf
                @method('put')
                <div class="mb-3">

                    <div class="mb-3">
                        <select name="idOrder" value="{{ $pay->idOrder }}" class="form-control">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }} {{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="idTypePay" value="{{ $pay->idTypePay }}" class="form-control">
                            @foreach ($typePays as $typePay)
                                <option value="{{ $typePay->id }}">{{ $typePay->id }} {{ $typePay->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <button class="btn btn-primary"type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
