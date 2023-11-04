@extends('layouts.plantilla')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 class="mt-4">Pqr</h1>

            <form action="{{ route('pqr.update', $pqr) }}" method="POST">

                @csrf
                @method('put')
                <div  class="mb-3">
                    

                    <div class="mb-3">
                        <label for="concentracion" class="form-label">Motivo:</label>
                        <input type="text" name="reason" value="{{ $pqr->reason }}">
                    </div>

                    <div >
                        <select name="idUser" value="{{ $pqr->idUser }}" class="form-control">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <br>

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                <div/>
            </form>

            <div></div>

        </div>
    @endsection
