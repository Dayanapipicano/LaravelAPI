@extends('layouts.plantilla')

@section('title','Productos')
@section('head')
<link rel="stylesheet" href="CSS/style.css">
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
            <a href="{{ route('temporada.create') }}">
                <p class="add-button">Agregar </p>
            </a>
            <div class="export__file">
                <a href="{{ route('inicio') }}"><label for="export-file" class="export__file-btn"
                        title="Export File"></label></a>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th class="icon-arrow"> Id </th>
                        <th class="icon-arrow"> nombre </th>
                        <th class="icon-arrow"> Acciones </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($season as $seasons)
                        <tr>
                            <td>{{ $seasons->id }}</td>
                            <td>{{ $seasons->name }}</td>

                            <td>
                                <div class="button-group">
                                    <form action="{{ route('season.destroy', $seasons->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete-button">X</button>
                                    </form>

                                    <a href="{{ route('season.edit', $seasons->id) }}"class="edit-button"><i
                                        class='bx bxs-edit-alt'></i></a>
                            </div>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
@endsection()
