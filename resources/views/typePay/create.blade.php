@extends('layouts.formulario')
@section('content')
    <div class="container">
        
            <h1 class="mt-4"> Forma de Pago </h1>

            <form action="{{ route('typePay.store') }}" method="POST">

                @csrf
                <div class="mb-3">


                    <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre:</label>
                        <input type="text" name="name" placeholder="nombre">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">  Enviar  </i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
