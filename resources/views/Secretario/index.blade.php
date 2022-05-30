@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar Secretarios</h1>
    <a href="{{ route('secretario.create')}}"> REGISTRAR NUEVO</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">CI</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Secretarios as $secretario)
            <tr>
                <td>{{$secretario->id}}</td>
                <td>{{$secretario->user->name}}</td>
                <td>{{$secretario->user->ci}}</td>
                <td>{{$secretario->user->address}}</td>
                <td>{{$secretario->user->phone}}</td>
                <td>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('secretario.show',$secretario) }}" class="table-data-option" style="color:rgb(92, 230, 92)"><i class="fa-solid fa-eye"></i></a>

                        <a href="{{ route('secretario.edit',$secretario) }}" class="table-data-option" style="color:rgb(102, 146, 228)"><i class="fa-solid fa-file-pen"></i></a>
                        
                        <form action="{{ route('secretario.destroy', $secretario) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')"class="table-data-option" style="color:rgb(238, 78, 73)"><i class="fa-solid fa-trash-can" ></i></button>
                        </form> 
                    </div>
                </td>    
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection