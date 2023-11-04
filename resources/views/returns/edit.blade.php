@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 class="mb-3">Devoluciones</h1>

            <form action="{{ route('returns.update', $returns) }}" method="POST">

                @csrf
                @method('put')
                <div class="mb-3">


                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo:</label>
                        <input type="text" name="reason" value="{{ $returns->reason }}">
                    </div>

                    <div class="input-field select-field">
                        <select name="idOrder" value="{{ $returns->idOrder }}" class="form-control">
                            @foreach ($orders as $order)
                                <option value="{{ $order->id }}">{{ $order->id }} {{ $order->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="input-field select-field">
                        <select name="idPqr" value="{{ $returns->idPqr }}" class="form-control">
                            @foreach ($pqrs as $pqr)
                                <option value="{{ $pqr->id }}">{{ $pqr->id }} {{ $pqr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="mb-3">
                        <button  class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
