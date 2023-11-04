@extends('layouts.plantilla')

@section('title','Productos')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
@endsection()

@section('content')
<main class="table">
    <section class="table__header">
        <h1>Registros</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <i class='bx bx-search-alt'></i>
        </div>
        <a href="{{ route('product.create') }}"><p class="add-button">Agregar </p></a>
        <div class="export__file">
            <a href="{{ route('inicio') }}"><label for="export-file" class="export__file-btn" title="Export File"></label></a>
        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th class="icon-arrow"> Id </th>
                    <th class="icon-arrow"> Nombre</th>
                    <th class="icon-arrow"> Descripcion</th>
                    <th class="icon-arrow"> Imagen </th>
                    <th class="icon-arrow"> Precio</th>
                    <th class="icon-arrow"> Concentracion </th>
                    <th class="icon-arrow"> Temporada</th>
                    <th class="icon-arrow"> Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $products)
                <tr>
                    <td>{{ $products->id }} </td>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->description }}</td>
                    <td>
                        <img src="{{ asset('storage/product/' . $products->image) }}" alt="Imagen del Producto">
                    </td>
                    
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->concentration }}</td>
                    <td>{{ $products->season->name }}</td>

                    <td>
                        <div class="button-group">
                        <form action="{{ route('product.destroy', $products->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="delete-button">x</button>

                            
                        </form>
                        <a href="{{ route('product.edit',$products->id) }}" class="edit-button"><i class='bx bxs-edit-alt'></i></a>
                    </div>
                    </td>

                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection()
{{-- <img src="http://localhost/laravelBasic/storage/app/public/product/1693764410.jpeg" alt=""> --}}
{{-- php artisan storage:link --}}
{{--  <p>URL de la imagen: {{ asset('storage/product/' . $products->image) }}</p> --}}
{{-- <img src="http://localhost/laravelBasic/storage/app/public/product/{{ $products->image }}" alt="Imagen de producto"> --}}
