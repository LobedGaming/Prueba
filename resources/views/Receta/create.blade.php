@extends('Layouts.dashboard')

@section('contenido')
    <h1>Agregar Receta</h1>
    <div class="card">
        <div class="card-header">
            <h5 class="modal-title" id="exampleModalLabel">Nueva Receta</h5>
        </div>
        <div class="card-body">
            <form action="{{route('receta.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="inputOtros" class="form-label">Descripción</label>
                <textarea class="form-control" style="resize: none;" id="inputOtros" name="description" id="" cols="30" rows="15" placeholder="Ingrese una descripción"></textarea>
                <input type="hidden" value="{{$cita}}" name="cita_id">
            </div>
                <a href="{{route('citas.citasDoctor', Auth::user()->id)}}" class="btn btn-secondary">Atras</a>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Registrar</button>
            </form>
        </div>
    </div>
@endsection