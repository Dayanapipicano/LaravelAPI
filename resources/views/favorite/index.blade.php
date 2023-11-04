
<link rel="stylesheet" href="CSS/style.css">

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<body>
<main class="table">
    <section class="table__header">
        <h1>Registros</h1>
        <div class="input-group">
            <input type="search" placeholder="Search Data...">
            <i class='bx bx-search-alt'></i>
        </div>
        <a href="{{route('favorite.create')}}"><p class="status delivered">Agregar </p></a>
        <div class="export__file">
            <a href="{{route('home')}}"><label for="export-file" class="export__file-btn" title="Export File"></label></a>

        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th class="icon-arrow"> Id </th>
                    <th class="icon-arrow"> usuario</th>
                    <th class="icon-arrow"> producto</th>
                    <th class="icon-arrow"> Acciones</th>
                </tr>
            </thead>
            @foreach ($favorite as $favorites)
            <tbody>
                <tr>
                    <td>{{$favorites->id}} </td>
                    <td>{{$favorites->idUser}}</td>
                    <td>{{$favorites->idProduct}}</td>
    
                    <td>
                        <form action="{{ route('favorite.destroy', $favorites->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="status delivered">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('favorite.edit',$favorites->id) }}"><p class="status delivered">Editar </p></a>
                    </td>
                </tr>
            </tbody>
            @endforeach</td>
        </table>
    </section>
    
</main>
</body>

