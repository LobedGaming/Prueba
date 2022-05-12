<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('estilos/estilos.css') }}">
<<<<<<< HEAD
        @yield('css')
        
=======
>>>>>>> 7a89782604f22fb663a113ba2ec00d3170cd5c6c
    </head>
    <body>
        <div class="contenedor-grid">
            <nav>
                <ul>
                    <li>Dashboard</li>
                </ul>
            </nav>
            <aside class="aside-dasboard">
                <ul>
<<<<<<< HEAD
                    <li><a href="{{route('doctors.index')}}">Gestion Doctores </a> </li>
                    <li><a href="">Gestion Secretarios </a> </li>
=======
                    <li><a href="">Gestion Doctores </a> </li>
                    <li><a href="{{ route('secretario.index')}}">Gestion Secretarios </a> </li>
>>>>>>> 7a89782604f22fb663a113ba2ec00d3170cd5c6c
                    <li><a href="">Gestion Pacientes</a> </li>
                    <li><a href="">Historicos</a></li>
                    <li><a href="{{ route('personalizar') }}">Personalizar</a></li>
                    <li><a href="">Mis citas</a></li>
                    <li><a href=""></a></li>
                </ul>
            </aside>
            <main>
                @yield('contenido')
                <script src="{{ asset('scripts/main.js') }}"></script>
               
            </main>
        </div>
    </body>
</html>

