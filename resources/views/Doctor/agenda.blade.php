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

        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" value="{{$cita->id}}" id="recetaBtn">Receta {{$cita->id}}</button> --}}

        <a href="{{route('receta.createCita', $cita->id)}}" class="btn btn-info">Crear Receta</a>
        <a href="{{route('receta.show', $cita->id)}}" class="btn btn-info">Ver Receta</a>
      
        <br>
        <span>-----------------------------</span>
        <span>-----------------------------</span>
    </div>
    @endforeach

    {{-- <script>
      var btnReceta = document.getElementById("recetaBtn")
      btnReceta.addEventListener('click', (e) => {
          alert("btnReceta.value")
          // var inputIdReceta = document.getElementById("idCita")
          // inputIdReceta.value = btnReceta.value;
      });
    </script> --}}
    
@endsection