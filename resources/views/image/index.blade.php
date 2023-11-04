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
        <a href="{{ route('image.create') }}"><p class="status delivered">Agregar</p></a>
        <div class="export__file">
            <a href="{{ route('home') }}"><label for="export-file" class="export__file-btn" title="Export File"></label></a>
        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th class="icon-arrow">url</th>
                    <th class="icon-arrow">images_id</th>
                    <th class="icon-arrow">images_type</th>
                    <th class="icon-arrow">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($image as $images)
                    <tr>
                        <td>{{ $images->url }}</td>
                        <td>{{ $images->images_id }}</td>
                        <td>{{ $images->images_type }}</td>
                        <td>
                            <form action="{{ route('image.destroy', [$images->images_id, $images->images_type]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="status delivered">Eliminar</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('image.edit', ['images_id' => $images->images_id, 'images_type' => $images->images_type]) }}">
                                <p class="status delivered">Editar</p>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
</body>
