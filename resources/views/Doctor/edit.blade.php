@extends('Layouts.dashboard')

@section('contenido')
<div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Editar Doctor: {{ $doctor->user->name }}</h3>           
        </div>
    </div>
<form action="{{ route('doctors.update',[$doctor->user->id]) }}" method="POST" autocomplete="off">
    @csrf   
    @method('PUT')
    <div class="row">
         <div>
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{$doctor->user->name}}">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror
                </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="ci">Carnet de Identidad</label>
                     <input id="ci" name="ci" type="text" class="form-control" value="{{$doctor->user->ci}}" >
                     @error('ci')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        
        <div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" id="address" class="form-control"  value="{{$doctor->user->address}}">
                @error('address')
                <span class="text-red">* {{ $message }} </span>
                @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="phone">Telefono</label>
                     <input id="phone" name="phone" type="text" class="form-control" value="{{$doctor->user->phone}}">
                     @error('phone')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        <div>
            <div class="form-group">
                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" value="{{$doctor->user->email}}">
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input id="password" name="password" type="password" class="form-control" value="{{$doctor->user->password}}"">
                     @error('password')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Fecha de Nacimiento</label>
                     <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" value="{{$doctor->user->fecha_nacimiento}}">
                     @error('fecha_nacimiento')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="especialidad">Especialidad</label>
                     <input id="especialidad" name="especialidad" type="text" class="form-control" value="{{$doctor->especialidad}}">
                     @error('especialidad')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>           
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Atras</a>
            <button type="submit" class="btn btn-info">Guardar</button>
        </div>
        
    </div>
    
 </form>
@endsection
