@extends('Layouts.dashboard')
@section('contenido')
<h1>Gestionar Citas</h1>
<a href="citas/create" class="btn btn-info mb-3">Nueva Cita</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre Paciente</th>
            <th>Fecha y Hora</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
        <tr>
            <td>{{ $cita->paciente->user->name}}</td>
            <td>{{ $cita->fecha_hora}}</td>
            <td>{{ $cita->description}}</td>
            <td>     
                <div class="table-data-option-list">
                    <form action="{{route ('citas.destroy',$cita->id)}}" method="POST"> 
                        <a href="{{route('citas.show',$cita->id)}}" class="table-data-option" style="color:rgb(102, 146, 228)"><i class="fa-solid fa-eye"></i></a>               
                         @method('DELETE')
                         @csrf
                        <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')" class="table-data-option" style="color:rgb(238, 78, 73)"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection