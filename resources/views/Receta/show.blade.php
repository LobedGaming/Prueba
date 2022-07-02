@extends('Layouts.dashboard')

@section('contenido')

        @if (session('info'))
            <div class="col-3 alert alert-success alert-dismissible fade show me-4" role="alert" style="position: fixed; bottom: 0; right: 0;">
                <strong>{{session('info')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @foreach ($recetas as $receta)
            <div class="container" id="report-container">
                <div class="card-header row">
                    
                    <div class="col-4 moverCaja" id="moverCaja1">
                        <p class="fw-bold fs-3 title-clinic align-self-center" id="content1">Clinic-Center</p>
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja2">
                        <p class="title-doctor" id="content2">{{$doctor[0]->name}}</p>                
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja3">
                        <p class="title-doctor-profesion" id="content3">Lic. en {{$doctor[1]->especialidad}}</p>
                    </div>
                    
                </div>
        
                <div class="card-body row">
        
                    <div class="col-4 moverCaja" id="moverCaja4">
                        <div class="row" id="content4">
                            <div class="col-auto">
                                <p  class="fw-bold fs-5">Paciente:</p>
                            </div>
                            <div class="col-auto">
                                <p class="ms-2 fs-5">{{$patient->name}}</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja5" style="height: auto;">
                        
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja6">
                        <div class="d-flex" id="content5">
                            <p  class="fw-bold fs-5">Fecha:</p>
                            <p class="ms-2 fs-5">{{$receta->fecha_hora}}</p>
                        </div>
                    </div>
        
                    <div class="col-12">
                        <div>
                            <p class="fw-bold fs-5">Descripción</p>
                            {{$receta->description}}
                        </div>
                    </div>
        
                </div>
        
                <div class="card-footer row">
                    
        
                    <div class="col-4 moverCaja" id="moverCaja7">
                    
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja8">
                        
                    </div>
        
                    <div class="col-4 moverCaja" id="moverCaja9">
                        <div class="row mt-3" id="content6">
                            <div class="col-auto">
                                <p class="fw-bold">Firma</p>
                            </div>
        
                            <div class="col-auto d-flex flex-column justify-content-center">
                                <div class="firm"></div>
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
            <br> <br> <br>
        @endforeach
        @if (Auth::user()->hasRole('Doctor'))
        <a href="{{route('citas.citasDoctor', Auth::user()->id)}}" class="btn btn-secondary col-2">Atras</a>
        <button class="btn btn-danger ms-3" id="btn-pdf">PDF</button>
        @endif
        @if(Auth::user()->hasRole('Administrador')) 
        <a href="{{route('historico.index')}}" class="btn btn-secondary col-2">Atras</a>
        @endif
        @if(Auth::user()->hasRole('Paciente')) 
        <a href="{{route('citas.citasPaciente',Auth::user()->id)}}" class="btn btn-secondary col-2">Atras</a>
        @endif
        <br> <br> <br>
        
        <script src="{{asset("scripts/toPDF.js")}}"></script>
@endsection
