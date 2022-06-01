@extends('Layouts.dashboard')
@section('contenido')
    <h1>Editar datos Secretario</h1>

    <form action="{{ route('secretario.update',$secretario) }}" method="POST" autocomplete="off">
        @csrf
        @method('put')
        <label for="name">Nombre Completo</label>
        <input type="text" id="name" class="form-control" name="name" value="{{old('name',$secretario->user->name)}}">
        @error('name')
            <small>*{{$message}}</small>
        @enderror

        <label for="ci">Carnet de Identidad</label>
        <input type="text" id="ci" name="ci" class="form-control" value="{{old('ci',$secretario->user->ci)}}">
        @error('ci')
            <small>*{{$message}}</small>
        @enderror
        
        <label for="address">Direccion</label>
        <input type="text" id="address" name="address" class="form-control"  value="{{old('address',$secretario->user->address)}}">
        @error('address')
            <small>*{{$message}}</small>
        @enderror

        <label for="phone">Telefono</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{old('phone',$secretario->user->phone)}}">
        @error('phone')
            <small>*{{$message}}</small>
        @enderror

        <label for="email">Correo Electronico</label>
        <input type="email" id="email" name="email" class="form-control" value="{{old('email',$secretario->user->email)}}">
        @error('email')
            <small>*{{$message}}</small>
        @enderror

        <label for="fecha_nacimiento">Fecha de Nacimiento</label >
        <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$secretario->user->fecha_nacimiento)}}">
        @error('fecha_nacimiento')
            <small>*{{$message}}</small>
        @enderror

        <div>           
            <a href="{{ route('secretario.index') }}" class="btn btn-secondary mt-4">Atras</a>
            <button type="submit" class="btn btn-info mt-4">Guardar</button>
        </div>
    </form>
@endsection