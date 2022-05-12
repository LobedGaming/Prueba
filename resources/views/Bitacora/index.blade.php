@extends('Layouts.dashboard')
@section('contenido')
    <table>
        <tr>
            <th>Id</th>
            <th>Fecha</th>
            <th>accion</th>
            <th>implicado</th>
            <th>apartado</th>
            <th>usuario</th>
        </tr>
        @foreach ($Bitacoras as $bitacora)
            <th>{{$bitacora->id}}</th>
            <th>{{$bitacora->fecha}}</th>
            <th>{{$bitacora->accion}}</th>
            <th>{{$bitacora->implicado}}</th>
            <th>{{$bitacora->apartado}}</th>
            <th>{{$bitacora->user_id}}</th>
        @endforeach

    </table>
@endsection