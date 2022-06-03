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

      <button type="button" class="btn btn-primary mt-4" value="{{$cita->id}}" id="recetaBtn">CrearReceta</button>
      <a href="{{route('receta.show', $cita->id)}}" class="btn btn-primary mt-4">Ver receta</a>
      <input type="hidden" name="cita_id" id="cita_id" value="{{$cita->id}}">
      <br
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