@extends('Layouts.dashboard')
@section('contenido')
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha-Hora</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Recetas</th>
              </tr>
            </thead>
            @foreach($citas as $cita)
            <tbody>
              <tr>
                <td> <span>{{$cita->paciente->user->name}}</span></td>
                <td>  <span>{{$cita->fecha_hora}}</span></td>
                <td>  <span>{{$cita->description}}</span></td>
                <td>  <a href="{{route('receta.show', $cita->id)}}" class="btn btn-info">Ver Receta</a></td>
              </div>
            </td>
              </tr>
            </tbody>
            @endforeach
          </table>

@endsection