@extends('layouts.formulario')

@section('content')
    <div class="container">
        
            <h1 class="mt-4">PQR</h1>

            <form action="{{ route('pqr.store') }}" method="POST">

                @csrf
                <div class="mb-3">


                    <div class="mb-3">
                        <label for="concentracion" class="form-label">Motivo:</label>
                        <input type="text" name="reason" >
                    </div>

                    <div>
                        <select name="idUser" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Enviar </i></button>
                    </div>
                </div>
            </form>

        

    </div>
@endsection
