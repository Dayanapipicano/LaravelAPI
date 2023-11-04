@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Notificacion</h1>

            <form action="{{ route('notification.update', $notification) }}" method="POST">

                @csrf
                @method('put')
                <div class="input-group">


                    <div class="input-field">
                        <input type="text" name="mensaje" value="{{ $notification->mensaje }}">
                    </div>


                    <div class="btn-field">
                        <button id="singUp" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
