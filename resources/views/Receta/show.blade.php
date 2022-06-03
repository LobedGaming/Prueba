@extends('Layouts.dashboard')

@section('contenido')
    @foreach ($recetas as $receta)
        <div class="container">
            <div class="card-header d-flex justify-content-between">
                <p class="fw-bold fs-3 title-clinic align-self-center">Clinic-Center</p>

                <div class="title-doctor">
                    <p>{{$doctor[0]->name}}</p>
                    <p>Lic. en {{$doctor[1]->especialidad}}</p>
                </div>

                <div class="end"></div>
                
            </div>

            <div class="card div-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex">
                            <p  class="fw-bold fs-5">Paciente:</p>
                            <p class="ms-2 fs-5">{{$patient->name}}</p>
                        </div>

                        <div class="d-flex">
                            <p  class="fw-bold fs-5">Fecha:</p>
                            <p class="ms-2 fs-5">{{$receta->fecha_hora}}</p>
                        </div>
                    </div>

                    <div class="">
                        <p class="fw-bold fs-5">Descripción</p>
                        <p>{{$receta->description}}</p>
                    </div>

                    <div class="firm d-flex justify-content-end">
                        <p class="fw-bold fs-5 me-2" style="position: relative; top: 20px;">Firma</p>
                        <input type="text" style="width: 15%; border:0; border-bottom: 2px solid black;"/>
                    </div>

                </div>
            </div>
        </div>
        <br> <br> <br>
        
    @endforeach
    <a href="{{route('citas.citasDoctor', Auth::user()->id)}}" class="btn btn-secondary col-2">Atras</a>
    <br> <br> <br>
@endsection