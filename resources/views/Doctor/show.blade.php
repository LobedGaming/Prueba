@extends('Layouts.dashboard')

@section('contenido')
<div class="row">
        <div>            
            <label for="">Nombre Completo:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->user->name }}
                </div>
            </div>
        </div>
        
        <div>            
            <label for="">Carnet de Identidad:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->user->ci }}
                </div>
            </div>
        </div>

        <div>            
            <label for="">Direccion:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->user->address }}
                </div>
            </div>
        </div>

        <div>            
            <label for="">Telefono:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->user->phone }}
                </div>
            </div>
        </div>

        <div>            
            <label for="">Correo Electronico:</label>
            <div class="panel panel-default">
                <div class="panel-body">  
                    @if($doctor->user->email)                  
                   {{ $doctor->user->email }}
                   @else
                        No tiene Correo Electronico
                    @endif
                </div>
            </div>
        </div>

        <div>            
            <label for="">Fecha de nacimiento:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->user->fecha_nacimiento }}
                </div>
            </div>
        </div>

        <div>            
            <label for="">Especialidad:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $doctor->especialidad }}
                </div>
            </div>
        </div>
        
        
        
        <div style="margin-top: 20px">
            <div class="form-group">             
                <a href="{{ route('doctors.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
 </div>
@endsection