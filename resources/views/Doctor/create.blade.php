@extends('Layouts.dashboard')

@section('contenido')
<form action="/doctors" method="POST" autocomplete="off">
    @csrf   
    <div class="col">
         <div>
                <div class="form-group">
                    <label for="name">Nombre Completo</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Nombre completo...">
                    @error('name')
                        <span class="text-red">* {{ $message }} </span>
                    @enderror
                </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="ci">Carnet de Identidad</label>
                     <input id="ci" name="ci" type="text" class="form-control" placeholder="Carnet de Identidad..." >
                     @error('ci')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        
        <div>
            <div class="form-group">
                <label for="address">Direccion</label>
                <input type="text" name="address" id="address" class="form-control"  placeholder="Direccion...">
                @error('address')
                <span class="text-red">* {{ $message }} </span>
                @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="phone">Telefono</label>
                     <input id="phone" name="phone" type="text" class="form-control" placeholder="Carnet de Identidad..." >
                     @error('phone')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>
        
        <div>
            <div class="form-group">
                     <label for="email">Correo Electronico</label>
                     <input id="email" name="email" type="email" class="form-control" placeholder="Email..." >
                     @error('email')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Contraseña</label>
                     <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña..." >
                     @error('password')
                        <span class="text-red"> * {{ $message }} </span>
                     @enderror
            </div>
        </div>

        <div>
            <div class="form-group">
                     <label for="password">Fecha de Nacimiento</label>
                     <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" class="form-control">
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
            <a href="/doctors" class="btn btn-secondary">Atras</a>
            <button type="submit" class="btn btn-info">Guardar</button>
        </div>
        
    </div>
    
 </form>
@endsection
