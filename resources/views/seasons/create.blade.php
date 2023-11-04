@extends('layouts.plantilla')

@section('content')

  
   
    <link rel="stylesheet" href="{{asset('css/form.css')}}">
    



    <div class="container6">
        
        <h1 class="mt-4">Temporada</h1>

        <form action="{{ route('temporadasStore') }}" method="POST">

            @csrf
            <div class="mb-3">

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input type="text" name="name">
                </div>

                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Enviar</i></button>
                </div>
            </div>
        </form>
        
    </div>


    @endsection()
