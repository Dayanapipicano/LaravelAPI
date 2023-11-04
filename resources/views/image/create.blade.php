@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Imagen</h1>

            <form action="{{ route('image.store') }}" method="POST">

                @csrf
                <div class="input-group">

                    <div class="input-field">
                        <input type="text" name="url" placeholder="Url">
                    </div>

                    <div class="input-field">
                        <input type="number" name="images_id" placeholder="imagenid">
                    </div>

                    <div class="input-field">
                        <input type="text" name="images_type" placeholder="Tipo de imagen">
                    </div>

                    <div class="btn-field">
                        <button id="singUp" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
