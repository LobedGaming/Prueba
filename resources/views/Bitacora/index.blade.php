@extends('Layouts.dashboard')
@section('contenido')
<h1>Bitacora</h1>
<div class="container" id="report-container">
    <table class="table table-striped">
      <thead>
        <tr>
            <th scope="col">Apartado</th>
            <th scope="col">Accion</th>
            <th scope="col">Implicado</th>
            <th scope="col">Fecha</th>
            <th scope="col">Usuario</th>
        </tr>
     </thead>
        <tbody>
                @foreach ($bitacoras as $bitacora)
            <tr>
                <td>{{$bitacora->apartado}}</td>
                <td>{{$bitacora->accion}}</td>
                <td>{{$bitacora->implicado}}</td>
                <td>{{$bitacora->fecha}}</td>
                <td>{{$bitacora->nombre_usuario}}</td>
            </tr>
                @endforeach
        </tbody>
    </table>
</div>
    <div style="margin-top: 20px">
        <div class="form-group">             
            <a href="{{ route('home') }}" class="btn btn-info">Atras</a>
            <button class="btn btn-danger ms-3" id="btn-pdf">PDF</button>
        </div>
    </div>
@endsection