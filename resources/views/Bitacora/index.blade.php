@extends('Layouts.dashboard')
@section('contenido')
<div class="d-flex justify-content-between">
    <div>
        <h1>Bitacora</h1>
        <h4>Seleccione los elementos que desea omitir</h4> 
    </div>
    <div>
        <ion-icon class="fs-1 text-primary" name="refresh-outline" id="refresh" style="cursor: pointer"></ion-icon>
    </div>
</div>

<div class="container mt-5" id="report-container">
    <table class="table table-striped">
      <thead>
        <tr>
            
            <th scope="col" class="thApartado">Apartado<input class="checkItem" type="checkbox" id="Apartado"></th>
            <th scope="col" class="thAccion">Accion<input class="checkItem" type="checkbox" id="Accion"></th>
            <th scope="col" class="thImplicado">Implicado<input class="checkItem" type="checkbox" id="Implicado"></th>
            <th scope="col" class="thFecha">Fecha<input class="checkItem" type="checkbox" id="Fecha"></th>
            <th scope="col" class="thUsuario">Usuario<input class="checkItem" type="checkbox" id="Usuario"></th>
        </tr>
     </thead>
        <tbody>
            @foreach ($bitacoras as $bitacora)
            <tr>
                <td class="tbApartado" >{{$bitacora->apartado}}</td>  
                <td class="tbAccion"   >{{$bitacora->accion}}</td>
                <td class="tbImplicado">{{$bitacora->implicado}}</td>
                <td class="tbFecha"    >{{$bitacora->fecha}}</td>
                <td class="tbUsuario"  >{{$bitacora->nombre_usuario}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div style="margin-top: 20px">
        <div class="form-group">             
            <a href="{{ route('home') }}" class="btn btn-info">Atras</a>
            <button class="btn btn-success ms-3" id="btnCheck">Previsualizar</button>
            <button class="btn btn-danger ms-3" id="btn-pdf">PDF</button>            
        </div>
    </div>
    <script src="{{asset("scripts/reportBitacora.js")}}"></script> 
    <script src="{{asset("scripts/toPDF.js")}}"></script>
    
@endsection
