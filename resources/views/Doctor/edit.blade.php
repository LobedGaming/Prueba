@extends('Layouts.dashboard')

@section('contenido')
<h1>Editar datos Doctor</h1>

<form action="{{ route('doctors.update',[$doctor->user->id]) }}" method="POST" autocomplete="off">
    @csrf   
    @method('PUT')

                
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{$doctor->user->name}}">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror



                     <label for="ci">Carnet de Identidad</label>
                     <input id="ci" name="ci" type="text" class="form-control" value="{{$doctor->user->ci}}" >
                     @error('ci')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
 
        
        

                    <label for="address">Direccion</label>
                    <input type="text" name="address" id="address" class="form-control"  value="{{$doctor->user->address}}">
                    @error('address')
                    <span class="text-red">* {{ $message }} </span>
                    @enderror



                     <label for="phone">Telefono</label>
                     <input id="phone" name="phone" type="text" class="form-control" value="{{$doctor->user->phone}}">
                     @error('phone')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror


                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" value="{{$doctor->user->email}}">
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror


                     <label for="password">Fecha de Nacimiento</label>
                     <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" value="{{$doctor->user->fecha_nacimiento}}">
                     @error('fecha_nacimiento')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror



                     <label for="especialidad">Especialidad</label>
                     <input id="especialidad" name="especialidad" type="text" class="form-control" value="{{$doctor->especialidad}}">
                     @error('especialidad')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror


        <div>           
            <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Atras</a>
            <button type="submit" class="btn btn-info">Guardar</button>
        </div>
    
 </form>
@endsection
