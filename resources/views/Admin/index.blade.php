@extends('Layouts.dashboard')

@section('contenido')
    <h1>Administradores</h1>
    <a href="{{ route('admin.create') }}"  class="btn btn-info mb-3" >Nuevo Administrador</a>
    <table  class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{ $admin->id}}</td>
            <td>{{ $admin->user->name}}</td>
            <td>{{ $admin->user->email}}</td>
            <td>     
                <div class="table-data-option-list">
                    <form action="{{route ('admin.destroy',$admin->id)}}" method="POST">
                    <a class="table-data-option" href="{{route('admin.edit',$admin->id)}}" style="color:rgb(92, 230, 92)"><i class="fa-solid fa-file-pen"></i></a> 
                        @method('delete')
                        @csrf
                        <button type="submit" class="table-data-option" onclick="return confirm('CONFIRMAR ELIMINACION')" style="color:rgb(238, 78, 73)"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 
   

@endsection