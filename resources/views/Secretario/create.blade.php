@extends('Layouts.dashboard')

@section('contenido')
 <h1>Nuevo Secretario</h1>

<form action="{{ route('secretario.store') }}" method="POST" autocomplete="off">
     @csrf
    <div class="col">
        <div>
            <div class="form-group">
                <label for="name">Nombre completo</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}"
                 placeholder="Nombre completo...">
                 @error('name')
                <small>*{{$message}}</small>
                 @enderror
            </div>
        </div>   

        <div>
            <div class="form-group">
                <label for="ci">Carnet de Identidad</label>
                <input type="text" id="ci" class="form-control" name="ci" value="{{old('ci')}}"  placeholder="Carnet de Identidad...">
                @error('ci')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" id="address" class="form-control" name="address"  value="{{old('address')}}" placeholder="Direccion...">
                @error('address')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                <label for="phone">Telefono</label>
                <input type="text" id="phone" class="form-control" name="phone" placeholder="Telefono..." value="{{old('phone')}}">
                @error('phone')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>
 
        <div>
            <div class="form-group">
                <label for="email">Correo electronico</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email..." value="{{old('email')}}">
                @error('email')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>
   
        <div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Contraseña..." value="{{old('password')}}">
                @error('password')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>
  
        <div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label >
                <input type="date" id="fecha_nacimiento" class="form-control" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}">
                @error('fecha_nacimiento')
                    <small>*{{$message}}</small>
                @enderror
            </div>
        </div>
         

        <div>           
            <a href="/secretario" class="btn btn-secondary">Atras</a>
            <button type="submit" class="btn btn-info">Guardar</button>
        </div>
     </div>

    </form>
@endsection