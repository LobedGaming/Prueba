<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('estilos/estilos.css') }}">
        @yield('css')
    </head>
    <body>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <div class="contenedor-grid">
            <nav class="nav">
                <ul class="ul">
                    <li class="li">Dashboard</li>
                </ul>
            </nav>
            <aside class="aside">
                <ul class="ul">
                    <li class="li">Mi Perfil</li>
                    <li class="titulo-rol">ADMINSTRADOR</li>
                    <li class="li"><a class="a" href="{{route('doctors.index')}}">Gestion Doctores</a> </li>
                    <li class="li"><a class="a" href="{{ route('secretario.index')}}">Gestion Secretarios</a> </li>
                    <li class="li"><a class="a" href="">Gestion Pacientes</a> </li>
                    <li class="li"><a class="a" href="">Historicos Clinicos</a></li>
                   {{-- <li><a href="{{ route('personalizar') }}">Personalizar</a></li>--}}
                    <li class="li"><a class="a" href="">Gestionar citas</a></li>
                    <li class="titulo-rol">SECRETARIO</li>
                    <li class="li"><a class="a" href="">Gestionar citas</a></li>
                    <li class="li"><a class="a" href="">Crear Paciente</a></li>
                    <li class="li"><a class="a" href="{{route('citas.index')}}">Crear Cita</a></li>
                    <li class="titulo-rol">DOCTOR</li>
                    <li class="li"><a class="a" href="">Mis citas</a></li>
                    <li class="titulo-rol li">PACIENTE</li>
                    <li class="li"><a class="a" href="">Mis citas</a></li>
                    <li class="li"><a class="a" href=""></a></li>
                </ul>
            </aside>
            <main class="main">
                @yield('contenido')
                <script src="{{ asset('scripts/main.js') }}"></script>
            </main>
        </div>
    </body>
</html>

