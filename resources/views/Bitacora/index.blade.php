@extends('Layouts.dashboard')
@section('contenido')
<h1>Bitacora</h1>
<div class="container" id="report-container">
    <table class="table table-striped">
      <thead>
        <tr>
            
            <th scope="col" id="thApartado" >Apartado  <input type="checkbox" id="checkApartado"></th>
            <th scope="col" id="thAccion"   >Accion    <input type="checkbox" id="checkAccion"></th>
            <th scope="col" id="thImplicado">Implicado <input type="checkbox" id="checkImplicado"></th>
            <th scope="col" id="thFecha"    >Fecha     <input type="checkbox" id="checkFecha"></th>
            <th scope="col" id="thUsuario"  >Usuario   <input type="checkbox" id="checkUsuario"></th>
        </tr>
     </thead>
        <tbody>
            @foreach ($bitacoras as $bitacora)
            <tr>
                
                <td style="display: all;" id="tbApartado" >{{$bitacora->apartado}}</td>  
                <td style="display: all;" id="tbAccion"   >{{$bitacora->accion}}</td>
                <td style="display: all;" id="tbImplicado">{{$bitacora->implicado}}</td>
                <td style="display: all;" id="tbFecha"    >{{$bitacora->fecha}}</td>
                <td style="display: all;" id="tbUsuario"  >{{$bitacora->nombre_usuario}}</td>
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
