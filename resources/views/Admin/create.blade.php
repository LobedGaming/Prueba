@extends('Layouts.dashboard')

@section('contenido')
    <h1>Crear Administrador</h1>
    
    <form action="{{route('admin.store')}}" method="post">
        @csrf

        <div class="form-row">
            <div class="">
                <div class="form-group">
                    <label for="">Nombre: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="Ingrese su nombre" name="name" value="{{old('name')}}">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Correo: </label>
                    <input type="text" class="form-control form-control-lg" placeholder="Ingrese su correo" name="mail" value="{{old('mail')}}">
                    @error('mail')
                        <small class="text-danger">{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="">Contraseña: </label>
                    <input type="password" class="form-control form-control-lg" placeholder="Ingrese una contraseña" name="password" value="{{old('password')}}">
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                        <br><br>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Crear administrador</button>
    </form>
@endsection