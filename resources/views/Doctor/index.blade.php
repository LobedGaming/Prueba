@extends('Layouts.dashboard')

@section('contenido')
<h1>Gestionar Doctores</h1>
<a href="{{ route('doctors.create') }}" class="btn btn-info mb-3">Nuevo Doctor</a>
<table style="width:100%">
        <tr>
            <th>Id</th>
            <th>Nombre Completo</th>
            <th>Ci</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Especialidad</th>
            <th>Acciones</th>
            
        </tr>
        @foreach($doctors as $doctor)
        <tr>
            <td>{{ $doctor->id}}</td>
            <td>{{ $doctor->user->name}}</td>
            <td>{{ $doctor->user->ci}}</td>
            <td>{{ $doctor->user->address}}</td>
            <td>{{ $doctor->user->phone}}</td>
            <td>{{ $doctor->especialidad}}</td>
            

            <td>     
                <a class="btn btn-primary btn-sm" href="{{route('doctors.edit',$doctor->id)}}">Editar</a>  
                <a class="btn btn-info btn-sm" href="{{route('doctors.show',$doctor->id)}}">Ver</a>  
                <form action="{{route ('doctors.destroy',$doctor->id)}}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('CONFIRMAR ELIMINACION')" value="Borrar">Eliminar</button>


                    </form>
            </td>
        </tr>
        @endforeach
</table>  
@endsection

