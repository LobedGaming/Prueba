@extends('Layouts.dashboard')

@section('contenido')
<a href="doctors/create" class="btn btn-info mb-3">Nuevo Doctor</a>
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
                  <form action="{{route ('doctors.destroy',$doctor->id)}}" method="POST">
                    <a class="btn btn-primary btn-sm" href="{{route('doctors.edit',$doctor->id)}}">Editar</a>  
                    <a class="btn btn-info btn-sm" href="{{route('doctors.show',$doctor->id)}}">Ver</a>  
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('CONFIRMAR ELIMINACION')" value="Borrar">Eliminar</button>


                    </form>
            </td>
        </tr>
        @endforeach
</table>  
@endsection

