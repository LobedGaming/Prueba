@extends('Layouts.dashboard')
@section('contenido')
    <h1>Ver Secretario</h1>
    <div class="contenedor-show">
        <div class="show-dato">
            <span>Nombre: </span>
            <span>{{$secretario->user->name}}</span>
        </div>
        <div class="show-dato">
            <span>Documento de identidad: </span>
            <span>{{$secretario->user->ci}}</span>
        </div>
        <div class="show-dato">
            <span>Direccion de domicilio: </span>
            <span>{{$secretario->user->address}}</span>
        </div>
        <div class="show-dato">
            <span>Numero de telefono: </span>
            <span>{{$secretario->user->phone}}</span>
        </div>
        <div class="show-dato">
            <span>Correo electronico: </span>
            <span>{{$secretario->user->email}}</span>
        </div>
        <div class="show-dato">
            <span>Fecha de nacimiento: </span>
            <span>{{$secretario->user->fecha_nacimiento}}</span>
        </div>
    </div>
    
@endsection