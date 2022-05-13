@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar pacientes</h1>
    <a href="{{ route('patient.create')}}"> REGISTRAR NUEVO</a>
    <table class="table-general">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>CI</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Opciones</th>
        </tr>
        @foreach ($patients as $patient)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->user->name}}</td>
                <td>{{$patient->user->ci}}</td>
                <td>{{$patient->user->address}}</td>
                <td>{{$patient->user->phone}}</td>
                <td>
                    <a href="{{ route('patient.show',$patient) }}">ver</a>
                    <a href="{{ route('patient.edit',$patient) }}">editar</a>
                    <form action="{{ route('patient.destroy', $patient) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')">Eliminar</button>
                    </form> 
                </td>    
            </tr>
            
        @endforeach
    </table>
@endsection