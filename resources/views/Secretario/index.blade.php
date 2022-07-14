@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar Secretarios</h1>
    @if(Auth::user()->plan=='basico' && $contador<1)
<a href="{{ route('secretario.create') }}"  class="btn btn-info mb-3" >Nuevo Secretario</a>
@else
@if(Auth::user()->plan=='basico')
<a href=""  class="btn btn-warning mb-3" >Solicite un nuevo Plan</a>
@else
<a href="{{ route('secretario.create') }}"  class="btn btn-info mb-3" >Nuevo Secretario</a>
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
            @foreach ($Secretarios as $secretario)
            @if ($id==$secretario->admin_id)
            <tr>
                <td>{{$secretario->id}}</td>
                <td>{{$secretario->user->name}}</td>
                <td>{{$secretario->user->ci}}</td>
                <td>{{$secretario->user->phone}}</td>
                <td>
                    <div class="table-data-option-list">
                        <form action="{{ route('secretario.destroy', $secretario) }}" method="POST">
                        <a href="{{ route('secretario.edit',$secretario) }}" class="table-data-option" style="color:rgb(92, 230, 92)"><i class="fa-solid fa-file-pen"></i></a>
                        <a href="{{ route('secretario.show',$secretario) }}" class="table-data-option" style="color:rgb(102, 146, 228)"><i class="fa-solid fa-eye"></i></a>
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('CONFIRMAR ELIMINACION')"class="table-data-option" style="color:rgb(238, 78, 73)"><i class="fa-solid fa-trash-can" ></i></button>
                        </form> 
                    </div>
                </td>    
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
    {{$Secretarios->links('pagination::bootstrap-5')}}
@endsection