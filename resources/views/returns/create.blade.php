@extends('layouts.formulario')

@section('content')
    <div class="container">
        
            <h1 class="mb-3">Devoluciones</h1>

            <form action="{{ route('returns.store') }}" method="POST">

                @csrf
                <div class="mb-3">


                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo:</label>
                        <input type="text" name="reason" placeholder="motivo">
                    </div>

                    <div class="input-field select-field">
                        <select name="idOrder" class="form-control">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }} {{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="input-field select-field">
                        <select name="idPqr" class="form-control">
                            @foreach ($pqrs as $pqr)
                                <option value="{{ $pqr->id }}">{{ $pqr->id }} {{ $pqr->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary">  Enviar </i></button>
                </div>
            </form>
        </div>
    </div>
@endsection
