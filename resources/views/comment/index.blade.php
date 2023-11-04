
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
        <a href="{{route('comment.create')}}"><p class="status delivered">Agregar </p></a>
        <div class="export__file">
            <a href="{{route('home')}}"><label for="export-file" class="export__file-btn" title="Export File"></label></a>

        </div>
    </section>
    <section class="table__body">
        <table>
            <thead>
                <tr>
                    <th class="icon-arrow"> Id </th>
                    <th class="icon-arrow"> comment_id</th>
                    <th class="icon-arrow"> comment_type</th>
                    <th class="icon-arrow"> mensaje</th>
                    <th class="icon-arrow"> Persona</th>
                    <th class="icon-arrow"> Acciones </th>
                </tr>
            </thead>
            @foreach ($comment as $comments)
            <tbody>
                <tr>
                    <td>{{$comments->id}} </td>
                    <td>{{$comments->comment_id}}</td>
                    <td>{{$comments->comment_type}}</td>
                    <td>{{$comments->mensaje}}</td>
                    <td>{{ $users[$comments->idUser] }}</td>
                    <td>
                        <form action="{{ route('comment.destroy', $comments->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="status delivered">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('comment.edit',$comments->id) }}"><p class="status delivered">Editar </p></a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </section>
    
</main>
</body>



