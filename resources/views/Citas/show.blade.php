@extends('Layouts.dashboard')
@section('contenido')
    <h1>Ver Cita</h1>
    <div class="contenedor-show">
        <div class="show-dato">
            <span>Nombre: </span>
            <span>{{$citas->paciente->user->name}}</span>
        </div>
       
        <div class="show-dato">
            <span>Fecha y Hora: </span>
            <span>{{$citas->fecha_hora}}</span>
        </div>
        <div class="show-dato">
            <span>Descripcion: </span>
            <span>{{$citas->description}}</span>
        </div>
    </div>
    
@endsection