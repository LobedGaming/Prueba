@extends('Layouts.dashboard')

@section('contenido')

        @if (session('info'))
            <div class="col-3 alert alert-success alert-dismissible fade show me-4" role="alert" style="position: fixed; bottom: 0; right: 0;">
                <strong>{{session('info')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach ($recetas as $receta)
            <div class="container">
                
                <div class="card-header d-flex justify-content-between" style="background-color:rgb(145, 175, 179);">
                    <p class="fw-bold fs-3 title-clinic align-self-center">Clinic-Center</p>

                    <div class="title-doctor">
                        <p>{{$doctor[0]->name}}</p>
                        <p>Lic. en {{$doctor[1]->especialidad}}</p>
                    </div>

                    <div class="end"></div>
                    
                </div>

                <div class="card-body" style="background-color: rgb(241, 241, 239);">
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
                        <p class="fw-bold fs-5 me-2" style="">Firma</p>
                        <div style="background-color: rgb(241, 241, 239); width: 15%; height: 30px; border:0; border-bottom: 2px solid black;"></div>
                    </div>

                </div>
            </div>
            <br> <br> <br>
        @endforeach
        <a href="{{route('citas.citasDoctor', Auth::user()->id)}}" class="btn btn-secondary col-2">Atras</a>
        <br> <br> <br>
@endsection