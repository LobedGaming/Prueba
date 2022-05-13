@extends('Layouts.dashboard')
@section('contenido')
<h3 class="text-center">LISTA DE DOCTORES</h3>
            <table style="width:100%">
                <tr>
                    <th>Nombre Completo</th>
                    <th>Especialidad</th>
                    <th>Acciones</th>  
                </tr>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->user->name}}</td>
                    <td>{{ $doctor->especialidad}}</td>
                    <td>     
                          <form action="" method="POST">
                            <input type="hidden" value="{{$doctor->user->id}}">
                            <a class="btn btn-success" href="">Seleccionar</a>   
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
@endsection