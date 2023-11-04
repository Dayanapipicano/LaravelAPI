@extends('layouts.formulario')
@section('content')
    <div class="container">

        <h1 class="mt-4"> Usuario </h1>

        <form action="{{ route('user.update', $user) }}" method="POST">

            @csrf
            @method('put')
            <div class="mb-3">

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}">
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Tipo de documeto:</label>
                    <input type="text" class="form-control" name="typeDocument"value="{{ $user->typeDocument }}">
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Documeto:</label>
                    <input type="tel" class="form-control" name="document"value="{{ $user->document }}">
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Telefono:</label>
                    <input type="tel" class="form-control" name="phone" value="{{ $user->phone }}">
                </div>



                <div class="input-field select-field">
                    <label for="archivo" class="form-label">Rol:</label>
                    <select name="idRol" value="{{ $user->idRol }}" class="form-control">
                        @foreach ($rol as $rols)
                            <option value="{{ $rols->id }}">{{ $rols->id }} {{ $rols->name }}</option>
                        @endforeach
                    </select>
                </div>

<br>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email"value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label for="Nombre" class="form-label">contraseña:</label>
                    <input type="password"  class="form-control"name="password"value="{{ $user->password }}">
                </div>



                <div class="btn-field">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
   
@endsection
