@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar Secretarios</h1>
    <a href="{{ route('secretario.create')}}"> REGISTRAR NUEVO</a>
    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>CI</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Opciones</th>
        </tr>
        @foreach ($Secretarios as $secretario)
            <tr>
                <td>{{$secretario->id}}</td>
                <td>{{$secretario->user->name}}</td>
                <td>{{$secretario->user->ci}}</td>
                <td>{{$secretario->user->address}}</td>
                <td>{{$secretario->user->phone}}</td>
                <td>
                    <a href="{{ route('secretario.show',$secretario) }}">ver</a>
                    <a href="{{ route('secretario.edit',$secretario) }}">editar</a>
                    <form action="{{ route('secretario.destroy', $secretario) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')">Eliminar</button>
                    </form> 
                </td>    
            </tr>
            
        @endforeach
    </table>
@endsection