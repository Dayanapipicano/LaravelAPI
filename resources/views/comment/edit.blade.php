@extends('layouts.formulario')

@section('content')
    <div class="container">
        <div class="form-content">
            <h1 id="title">Comentario</h1>

            <form action="{{ route('comment.update', $comment) }}" method="POST">

                @csrf
                @method('put')
                <div class="input-group">


                    <div class="input-field">
                        <input type="number" name="comment_id" value="{{ $comment->comment_id }}">
                    </div>

                    <div class="input-field">
                        <input type="text" name="comment_type" value="{{ $comment->comment_type }}">
                    </div>

                    <div class="input-field">
                        <input type="text" name="mensaje" value="{{ $comment->mensaje }}">
                    </div>

                    <div class="input-field select-field">
                        <select name="idUser" value="{{ $comment->idUser }}" class="styled-select">
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
