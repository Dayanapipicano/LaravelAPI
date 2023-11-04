@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Comentario</h1>

            <form action="{{ route('comment.store') }}" method="POST">

                @csrf
                <div class="input-group">


                    <div class="input-field">
                        <input type="number" name="comment_id" placeholder="comment_id">
                    </div>


                    <div class="input-field">
                        <input type="text" name="comment_type" placeholder="comment_type">
                    </div>

                    <div class="input-field">
                        <input type="text" name="mensaje" placeholder="mensaje">
                    </div>


                    <div class="input-field select-field">
                        <select name="idUser" class="styled-select">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="btn-field">
                        <button id="singUp" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
