@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar Pacientes</h1>
@if(Auth::user()->plan=='basico' && $contador<1)
<a href="{{ route('patient.create') }}"  class="btn btn-info mb-3" >Nuevo Paciente</a>
@else
@if(Auth::user()->plan=='basico')
<a href=""  class="btn btn-warning mb-3" >Solicite un nuevo Plan</a>
@else
<a href="{{ route('patient.create') }}"  class="btn btn-info mb-3" >Nuevo Paciente</a>
@endif
@endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">CI</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            @if ($id==$patient->admin_id)
            <tr>
                <td>{{$patient->id}}</td>
                <td>{{$patient->user->name}}</td>
                <td>{{$patient->user->ci}}</td>
                <td>{{$patient->user->phone}}</td>
                <td>
                    <div class="table-data-option-list">
                        <form action="{{ route('patient.destroy', $patient) }}" method="POST">
                        <a href="{{ route('patient.edit',$patient) }}" class="table-data-option" style="color:rgb(92, 230, 92)"><i class="fa-solid fa-file-pen"></i></a>
                        <a href="{{ route('patient.show',$patient) }}" class="table-data-option" style="color:rgb(102, 146, 228)"><i class="fa-solid fa-eye"></i></a>
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')" class="table-data-option" style="color:rgb(238, 78, 73)"><i class="fa-solid fa-trash-can"></i></button>
                        </form> 
                    </div>
                    
                </td>    
            </tr>
        @endif
        @endforeach
        </tbody>
    </table>
    {{$patients->links('pagination::bootstrap-5')}}
@endsection