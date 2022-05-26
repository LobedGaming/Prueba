@extends('Layouts.dashboard')
@section('contenido')
<a href="citas/create" class="btn btn-info mb-3">Nueva Cita</a>
<table style="width:100%">
        <tr>
            <th>Nombre Paciente</th>
            <th>Fecha y Hora</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
        @foreach($citas as $cita)
        <tr>
            <td>{{ $cita->paciente->user->name}}</td>
            <td>{{ $cita->fecha_hora}}</td>
            <td>{{ $cita->description}}</td>
            <td>     
                <a class="btn btn-info btn-sm" href="{{route('citas.show',$cita->id)}}">Ver</a>  
                <form action="{{route ('citas.destroy',$cita->id)}}" method="POST"> 
                @method('DELETE')
                @csrf

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('CONFIRMAR ELIMINACION')" value="Borrar">Eliminar</button>


                    </form>
            </td>
        </tr>
        @endforeach
</table>
@endsection