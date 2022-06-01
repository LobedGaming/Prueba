@extends('Layouts.dashboard')

@section('contenido')
    <h1>Nuevo Administrador</h1>
    
    <form action="/admin" method="post">
        @csrf
        <div class="form-row">
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" placeholder="Nombre completo...">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror
                </div>
    
                <div class="form-group">
                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" placeholder="Email..." value="{{old('email')}}">
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
                </div>
    
                <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{old('password')}}" >
                     @error('password')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
        <a href="/admins" class="btn btn-secondary mt-4">Atras</a>
        <button type="submit" class="btn btn-info mt-4">Crear administrador</button>
        </div>
    </form>
@endsection