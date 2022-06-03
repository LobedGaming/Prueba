@extends('Layouts.dashboard')
@section('contenido')

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand">ID del paciente: </a>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Ingrese ID" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
    </div>
  </nav>
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
        <tr>
            <td>{{$patient->id}}</td>
            <td>{{$patient->user->name}}</td>
            <td>{{$patient->user->ci}}</td>
            <td>{{$patient->user->phone}}</td>
            <td>
                <div class="table-data-option-list">

                    <a href="{{ route('historico.show',$patient->id) }}" class="table-data-option" style="color:rgb(102, 146, 228)"><i class="fa-solid fa-eye"></i></a>
                       
                </div>
                
            </td>    
        </tr>
        
    @endforeach
    </tbody>
    
</table>

@endsection