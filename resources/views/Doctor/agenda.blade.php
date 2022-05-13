@extends('Layouts.dashboard')
@section('contenido')
<h1>Ver Cita</h1>
@foreach ($citas as $cita)
    <div class="contenedor-show">
        <div class="show-dato">
            <span>Nombre: </span>
            <span>{{$cita->paciente->user->name}}</span>
        </div>
       
        <div class="show-dato">
            <span>Fecha y Hora: </span>
            <span>{{$cita->fecha_hora}}</span>
        </div>
        <div class="show-dato">
            <span>Descripcion: </span>
            <span>{{$cita->description}}</span>
        </div>
        <span>-----------------------------</span>
        <span>-----------------------------</span>
    </div>
    @endforeach
@endsection