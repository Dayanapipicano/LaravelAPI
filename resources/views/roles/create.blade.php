@extends('layouts.formulario')

@section('content')
    <div class="container">
        
            <h1 class="mt-4">Rol</h1>

            <form action="{{ route('rolesStore') }}" method="POST">

                @csrf
                <div class="mb-3">


                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Nombre:</label>
                        <input type="text" name="name" >
                    </div>

                    <div class="btn-field">
                        <button type="submit" class="btn btn-primary">Enviar </i></button>
                    </div>
                </div>
            </form>
        
    </div>
@endsection
