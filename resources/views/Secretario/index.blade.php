@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar Secretarios</h1>
    <a href="{{ route('secretario.create')}}" class="btn btn-info mb-3"> Nuevo Secretario</a>
    <table style="width:100%">
        <tr>
            <th>Id</th>
            <th>Nombre Completo</th>
            <th>Ci</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
        @foreach ($Secretarios as $secretario)
            <tr>
                <td>{{$secretario->id}}</td>
                <td>{{$secretario->user->name}}</td>
                <td>{{$secretario->user->ci}}</td>
                <td>{{$secretario->user->address}}</td>
                <td>{{$secretario->user->phone}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('secretario.edit',$secretario) }}">editar</a>
                    <a class="btn btn-info btn-sm" href="{{ route('secretario.show',$secretario) }}">ver</a>
                    <form action="{{ route('secretario.destroy', $secretario) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('CONFIRMAR ELIMINACION')">Eliminar</button>
                    </form> 
                </td>    
            </tr>
            
        @endforeach
    </table>
@endsection