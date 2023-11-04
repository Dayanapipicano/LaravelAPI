@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="mt-4">Forma de Pago</h1>

            <form action="{{ route('typePay.update', $typePay) }}" method="POST">


                @csrf
                @method('put')
                <div class="class="mb-3"">


                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre:</label>
                        <input type="text" name="name" value="{{ $typePay->name }}">
                    </div>


                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
