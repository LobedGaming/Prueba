@extends('Layouts.dashboard')

@section('contenido')
<div class="row">
        <div>            
            <label for="">Nombre Completo:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $citas->patient->name}}
                </div>
            </div>
        </div>
        <div>            
            <label for="">Fecha y Hora:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $citas->fecha_hora }}
                </div>
            </div>
        </div>
        <div>            
            <label for="">Descripción:</label>
            <div class="panel panel-default">
                <div class="panel-body">                    
                   {{ $citas->description}}
                </div>
            </div>
        </div>      
 </div>
@endsection