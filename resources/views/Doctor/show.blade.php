@extends('Layouts.dashboard')

@section('contenido')
<div class="contenedor-show">
                   
            <div class="show-dato">
                <span>Nombre Completo:</span>
                <span>
                    {{ $doctor->user->name }}                  
                </span>
            </div>
        
        
        <div class="show-dato">            
                <span>Carnet de Identidad:</span>
                <span>                    
                   {{ $doctor->user->ci }}
                </span>  
        </div>

        <div class="show-dato">            
            <span for="">Direccion:</span>
                <span>                    
                   {{ $doctor->user->address }}
                </span>
        </div>

        <div class="show-dato">            
            <span>Telefono:</span>
                <span>                    
                   {{ $doctor->user->phone }}
                </span>
        </div>

        <div class="show-dato">            
            <span>Correo Electronico:</span>
                <span>  
                    @if($doctor->user->email)                  
                   {{ $doctor->user->email }}
                   @else
                        No tiene Correo Electronico
                    @endif
                </span>
        </div>

        <div class="show-dato">            
            <span for="">Fecha de nacimiento:</span>
                <span>                    
                   {{ $doctor->user->fecha_nacimiento }}
                </span>
        </div>

        <div class="show-dato">            
            <span>Especialidad:</span>
                <span>                    
                   {{ $doctor->especialidad }}
                </span>
        </div>
        
        
        
        <div style="margin-top: 20px">
            <div class="form-group">             
                <a href="{{ route('doctors.index') }}" class="btn btn-info">Atras</a>
            </div>
        </div>
 </div>
@endsection