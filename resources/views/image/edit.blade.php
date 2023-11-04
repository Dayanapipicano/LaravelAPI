@extends('layouts.formulario')
@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Imagen</h1>

            <form
                action="{{ route('image.update', ['images_id' => $image->images_id, 'images_type' => $image->images_type]) }}"
                method="POST">

                @csrf
                @method('put')
                <div class="input-group">


                    <div class="input-field">
                        <input type="text" name="url" value="{{ $image->url }}">
                    </div>


                    <div class="input-field">
                        <input type="number" name="images_id" value="{{ $image->images_id }}">
                    </div>


                    <div class="input-field">
                        <input type="text" name="images_type" value="{{ $image->images_type }}">
                    </div>

                    <div class="btn-field">
                        <button id="singUp" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
