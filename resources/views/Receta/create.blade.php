@extends('Layouts.dashboard')

@section('contenido')
    <h1>Agregar Receta</h1>
    <br><br>
    <div class="container">
        <div class="card-header" style="background-color:rgba(145, 175, 179, 0.646);">
            <h5 class="fw-bold fs-4">Nueva Receta</h5>
        </div>

        <div class="card-body" style="background-color: rgba(241, 241, 239, 0.6)">
            <form action="{{route('receta.store')}}" method="post">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="inputOtros" class="fw-bold fs-5">Descripción</label>
                    <textarea class="form-control mt-2" style="resize: none;" id="inputOtros" name="description" id="" cols="30" rows="15" placeholder="Ingrese una descripción"></textarea>
                    <input type="hidden" value="{{$cita}}" name="cita_id">
                </div>
                <a href="{{route('citas.citasDoctor', Auth::user()->id)}}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-info" data-bs-dismiss="modal">Registrar</button>
            </form>
        </div>
    </div>
@endsection