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
        <a href="{{route('notification.create')}}"><p class="status delivered">Agregar </p></a>
        <div class="export__file">
            <a href="{{route('home')}}"><label for="export-file" class="export__file-btn" title="Export File"></label></a>

        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th class="icon-arrow"> Id </th>
                    <th class="icon-arrow"> Mensaje</th>
                    <th class="icon-arrow"> Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Abre el cuerpo de la tabla aquí -->
                @foreach ($notification as $notifications)
                <tr>
                    <td>{{$notifications->id}} </td>
                    <td>{{$notifications->mensaje}}</td>
                    <td>
                        <form action="{{ route('notification.destroy', $notifications->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="status delivered">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('notification.edit',$notifications->id) }}"><p class="status delivered">Editar </p></a>
                    </td>
                </tr>
                @endforeach
            </tbody> 
        </table>
    </section>
    
</main>
</body>

