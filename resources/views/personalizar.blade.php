@extends('Layouts.dashboard')
@section('contenido')
    <h1>Personalizacion de pagina</h1>

    <h2 class="titulo-descripcion">Personalizacion rapida</h2>
    <div class="personalizar-input">        
        <label for="temas-rapidos" >Seleccione un tema</label>
        <select name="temas-rapidos" id="temas-rapidos">
            <option value="0">Seleccione</option>
            <option value="1">Tema claro</option>
            <option value="2">Tema oscuro</option>
            <option value="3">Tema predefinido</option>
        </select>
    </div>
    <div class="personalizar-input">
        <label for="font-size">Tamaño de fuente</label>
        <input id="font-size" type="number" min="15" max="30">
        <h3>texto de ejemplo</h3>
        <div class="contenedor-texto-ejemplo">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum qui voluptatibus provident quia tenetur itaque fuga unde, harum nobis aut soluta nesciunt totam, quasi alias quaerat maiores sequi? Quidem, modi. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, molestias! Similique minima, deleniti quos autem neque vero modi nemo, veritatis excepturi quasi deserunt enim temporibus aliquid? Vitae fugit eos esse! Lorem, ipsum dolor sit amet consectetur adipisicing el</p>
        </div>
    </div>
    <h2 class="titulo-descripcion">Personalizacion avanzada</h2>
    <div class="personalizar-input">
        <label for="bg-color">Color de fondo</label>
        <input type="color" id="bg-color" >
    </div>
    
    <div class="personalizar-input">
        <label for="navbar-color">Color de Barra de Navegacion</label>
        <input type="color" id="navbar-color"">
    </div>
    <div class="personalizar-input">
        <label for="aside-color">Color barra lateral</label>
        <input type="color" id="aside-color" >
    </div>
    <div class="personalizar-input">
        <label for="text-color">Color de texto</label>
        <input type="color" id="text-color" >
    </div>
    <div class="personalizar-input">
        <label for="text-color-nav">Color de texto en la barra de navegacion</label>
        <input type="color" id="text-color-nav" >
    </div>
    <div class="personalizar-input">
        <label for="text-color-aside">Color de texto en la barra lateral</label>
        <input type="color" id="text-color-aside" >
    </div>
    <div class="personalizar-input">
        <button id="btn-guardar"">Guardar cambios</button>
    </div>
    
@endsection
@section('script')
<script src="{{ asset('scripts/personalizacion.js') }}"></script>    
@endsection
