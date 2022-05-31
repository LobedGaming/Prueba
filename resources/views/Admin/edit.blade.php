@extends('Layouts.dashboard')

@section('contenido')
<h1>Editar datos Doctor</h1>

<form action="{{ route('admin.update',[$admin->user->id]) }}" method="POST" autocomplete="off">
   @csrf   
   @method('PUT')

                
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{$admin->user->name}}">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror



                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" value="{{$admin->user->email}}">
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror


        <div>           
            <a href="{{ route('admin.index') }}" class="btn btn-secondary mt-4">Atras</a>
            <button type="submit" class="btn btn-info mt-4">Guardar</button>
        </div>
    
 </form>
 @endsection