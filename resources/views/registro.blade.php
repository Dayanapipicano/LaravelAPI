@extends('layouts.plantilla')

@section('title','Registrarse')

@section('head')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <link rel="stylesheet" href="{{asset('css/registro.css')}}">
@endsection()

@section('content')
    <div class="container">
        <div class="register-container">
          <div class="register-form">
            <h2 class="text-center mb-4"><i class="fas fa-user-plus"></i> Registrarse</h2>
            <form>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control" id="username" placeholder="Nombre de Usuario">
                </div>
             
@endsection()