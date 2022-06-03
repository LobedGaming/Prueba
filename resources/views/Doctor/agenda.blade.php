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

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" value="{{$cita->id}}" id="recetaBtn">Receta {{$cita->id}}</button>

        <a href="{{route('receta.show', $cita->id)}}" class="btn btn-primary">Ver receta</a>
    
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Receta {{$cita->id}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-body">
                <form action="{{route('receta.store')}}" method="post">
                  @csrf
                  <div class="mb-3">
                    <label for="inputOtros" class="form-label">Descripción</label>
                    <textarea class="form-control" style="resize: none;" id="inputOtros" name="description" id="" cols="30" rows="15" placeholder="Ingrese una descripción"></textarea>

                    {{-- <input type="text" value={{$cita->id}} name="idCita" id="idCita"> --}}

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Registrar</button>
                    {{-- <a type="submit" href="{{route('receta.edit', $cita->id)}}" class="btn btn-primary">Registrar</a> --}}
                  </div>

                </form>
              </div>

            </div>
          </div>
        </div>
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