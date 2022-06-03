@extends('Layouts.dashboard')

@section('contenido')
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
                    <input type="text" value={{$cita->id}} name="idCita" id="idCita"> 
                    <input type="text" name="cita_id" id="cita_id" value="{{$cita->id}}">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Registrar</button>
                    <a type="submit" href="{{route('receta.edit', $cita->id)}}" class="btn btn-primary">Registrar</a> 
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection