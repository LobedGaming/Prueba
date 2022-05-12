<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('patient/styles/index.css')}}">
    </head>
    <body>
        <div class="contenedor-grid">
            <nav>
                <ul>
                    <li>Dashboard</li>
                    <li>Dashboard 2</li>
                </ul>
            </nav>
            <aside class="aside-dasboard">
                <ul>
                    <li><a href="">Perfil </a> </li>
                    <li><a href="">Citas </a> </li>
                </ul>
            </aside>
            
            <main>
                {{-- @yield('contenido')
                <script src="{{ asset('scripts/main.js') }}"></script>
                @yield('script') --}}
                <x-card 
                fecha="03/04/2004"
                hora="07:00"
                nameDoctor="Juan Perez Perez"
                description="Lorem ipsum dolor sit amet consectetur adipisicing elit. Et asperiores optio corporis exercitationem a aut rem nihil saepe consequuntur ipsum quidem odit quam sequi, debitis excepturi accusamus! Nobis, tempora minima!"
                ></x-card>
            </main>
        </div>
    </body>
</html>
