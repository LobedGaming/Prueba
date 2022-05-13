@extends('Layouts.dashboard')
@section('contenido')
    <h1>Gestionar paciente</h1>

    <form action="{{ route('patient.store') }}" method="POST" autocomplete="off">
        @csrf
        <label for="name">Nombre completo</label>
        <input type="text" id="name" name="name" value="{{old('name')}}">
        @error('name')
            <small>*{{$message}}</small>
        @enderror

        <label for="ci">Numero de docomento de identidad</label>
        <input type="number" id="ci" name="ci" value="{{old('ci')}}">
        @error('ci')
            <small>*{{$message}}</small>
        @enderror

        <label for="address">Direccion domiciliario</label>
        <input type="text" id="address" name="address"  value="{{old('address')}}">
        @error('address')
            <small>*{{$message}}</small>
        @enderror

        <label for="phone">Numero de telefono</label>
        <input type="number" id="phone" name="phone" value="{{old('phone')}}">
        @error('phone')
            <small>*{{$message}}</small>
        @enderror

        <label for="email">Correo electronico</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        @error('email')
            <small>*{{$message}}</small>
        @enderror

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" value="{{old('password')}}">
        @error('password')
            <small>*{{$message}}</small>
        @enderror

        <label for="fecha_nacimiento">Fecha de nacimiento</label >
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
        @error('fecha_nacimiento')
            <small>*{{$message}}</small>
        @enderror

        <input type="submit">
    </form>
@endsection