@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 class="mt-4">Temporada</h1>

            <form action="{{ route('season.update', ['season' => $season->id]) }}" method="POST">


                @csrf
                @method('put')

                <div class="mb-3">



                    <div class="input-field">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" name="name" value="{{ $season->name }}">
                    </div>

                    <div class="btn-field">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
