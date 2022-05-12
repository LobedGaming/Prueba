@extends('Layouts.dashboard')
@section('contenido')
    <h1>Editar datos secretario</h1>

    <form action="{{ route('secretario.update',$secretario) }}" method="POST" autocomplete="off">
        @method('put')
        @csrf
        <label for="name">Nombre completo</label>
        <input type="text" id="name" name="name" value="{{old('name',$secretario->user->name)}}">
        @error('name')
            <small>*{{$message}}</small>
        @enderror

        <label for="ci">Numero de docomento de identidad</label>
        <input type="number" id="ci" name="ci" value="{{old('ci',$secretario->user->ci)}}">
        @error('ci')
            <small>*{{$message}}</small>
        @enderror
        
        <label for="address">Direccion domiciliario</label>
        <input type="text" id="address" name="address"  value="{{old('address',$secretario->user->address)}}">
        @error('address')
            <small>*{{$message}}</small>
        @enderror

        <label for="phone">Numero de telefono</label>
        <input type="number" id="phone" name="phone" value="{{old('phone',$secretario->user->phone)}}">
        @error('phone')
            <small>*{{$message}}</small>
        @enderror

        <label for="email">Correo electronico</label>
        <input type="email" id="email" name="email" value="{{old('email',$secretario->user->email)}}">
        @error('email')
            <small>*{{$message}}</small>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label >
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento',$secretario->user->fecha_nacimiento)}}">
        @error('fecha_nacimiento')
            <small>*{{$message}}</small>
        @enderror

        <input type="submit">
    </form>
@endsection