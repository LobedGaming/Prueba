@extends('Layouts.dashboard')
@section('contenido')
    <h1>Editar datos secretario</h1>

    <form action="{{ route('patient.update',$patient) }}" method="POST" autocomplete="off">
        @csrf
        @method('put')


        <label for="name">Nombre Completo</label>
        <input type="text" id="name" name="name" class="form-control" value="{{old('name',$patient->user->name)}}">
        @error('name')
            <small>*{{$message}}</small>
        @enderror



        <label for="ci">Carnet de Identidad</label>
        <input type="number" id="ci" name="ci" class="form-control" value="{{old('ci',$patient->user->ci)}}">
        @error('ci')
            <small>*{{$message}}</small>
        @enderror
        


        <label for="address">Direccion</label>
        <input type="text" id="address" name="address" class="form-control" value="{{old('address',$patient->user->address)}}">
        @error('address')
            <small>*{{$message}}</small>
        @enderror



        <label for="phone">Telefono</label>
        <input type="number" id="phone" name="phone" class="form-control"value="{{old('phone',$patient->user->phone)}}">
        @error('phone')
            <small>*{{$message}}</small>
        @enderror



        <label for="email">Correo Electronico</label>
        <input type="email" id="email" name="email" class="form-control"value="{{old('email',$patient->user->email)}}">
        @error('email')
            <small>*{{$message}}</small>
        @enderror



        <label for="fecha_nacimiento">Fecha de Nacimiento</label >
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{old('fecha_nacimiento',$patient->user->fecha_nacimiento)}}">
        @error('fecha_nacimiento')
            <small>*{{$message}}</small>
        @enderror



        <div>           
            <a href="{{ route('patient.index') }}" class="btn btn-secondary mt-4">Atras</a>
            <button type="submit" class="btn btn-info mt-4">Guardar</button>
        </div>

    </form>
@endsection