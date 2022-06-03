@extends('Layouts.dashboard')
@section('contenido')
<form action="{{route('citas.store')}} " method="POST">
@csrf
<h1 class="text-center">Creacion de Cita</h1>

        <h3 class="text-center">Lista de Doctores</h3>
            <table style="width:100%">
                <tr>
                    <th>Nombre Completo</th>
                    <th>Especialidad</th>
                    <th>Seleccionar</th>
                </tr>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->user->name}}</td>
                    <td>{{ $doctor->especialidad}}</td>
                    <td>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="doctor_id" id="doctor_id" value="{{$doctor->id}}" checked>
                            <label for=""></label>
                        </div>

                    </td>
                </tr>
                @endforeach
                <input type="hidden">
            </table>


<h3 class="text-center">Lista de Pacientes</h3>
            <table style="width:100%">
                <tr>
                    <th>Nombre Completo</th>
                    <th>Seleccionar</th>
                </tr>
                @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->user->name}}</td>
                    <td>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="patient_id" id="patient_id" value="{{$patient->id}}" checked>
                            <label for=""></label>
                        </div>

                    </td>
                </tr>
                @endforeach
                <input type="hidden">
            </table>

 <h3 class="text-center">Detalles de la Cita</h3>


            <div class="form-group">
                <label for="fecha_hora">Fecha y Hora:</label>
                <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control" >
                @error('fecha_hora')
                <span class="text-red">* {{ $message }} </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Descripcion:</label>
                <input type="description" name="description" id="description" class="form-control"  style="width: 100%;">
                @error('description')
                <span class="text-red">* {{ $message }} </span>
                @enderror
            </div>
            <div>
                <a href="/citas" class="btn btn-secondary mt-4">Atras</a>
                <button type="submit" class="btn btn-info mt-4">Guardar</button>
            @if(session('info'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('info')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            </div>
     </form>



@endsection