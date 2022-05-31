@extends('Layouts.dashboard')

@section('contenido')
<h1>Nuevo Doctor</h1>

<form action="/doctors" method="POST" autocomplete="off">
    @csrf   
    <div class="form-row">
         <div>
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" placeholder="Nombre completo...">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror
                </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="ci">Carnet de Identidad</label>
                     <input id="ci" name="ci" type="text" class="form-control" value="{{old('ci')}}" placeholder="Carnet de Identidad...">
                     @error('ci')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        
        <div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" id="address" class="form-control" value="{{old('address')}}" placeholder="Direccion...">
                @error('address')
                <span class="text-red">* {{ $message }} </span>
                @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="phone">Telefono</label>
                     <input id="phone" name="phone" type="text" class="form-control" placeholder="Telefono..." value="{{old('phone')}}">
                     @error('phone')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        <div>
            <div class="form-group">
                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" placeholder="Email..." value="{{old('email')}}">
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." value="{{old('password')}}" >
                     @error('password')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Fecha de Nacimiento</label>
                     <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control" value="{{old('fecha_nacimiento')}}">
                     @error('fecha_nacimiento')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="especialidad">Especialidad</label>
                     <input id="especialidad" name="especialidad" type="text" class="form-control" placeholder="Especialidad..." >
                     @error('especialidad')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>           
            <a href="/doctors" class="btn btn-secondary mt-4">Atras</a>
            <button type="submit" class="btn btn-info mt-4">Guardar</button>
        </div>
        
    </div>
    
 </form>
@endsection
