@extends('Layouts.dashboard')
@section('contenido')
    <h1>Personalizar reporte - recetas</h1>

    <div class="container" id="report-container">
        <div class="card-header row">
            
            <div class="col-4 moverCaja" id="moverCaja1">
                <p class="fw-bold fs-3 title-clinic align-self-center">Clinic-Center</p>
            </div>

            <div class="col-4 moverCaja" id="moverCaja2">
                <p class="title-doctor">Joaquin Chumacero Mamani</p>
                <p class="title-doctor-profesion">Lic. en Oftalmología</p>
            </div>

            <div class="col-4 moverCaja" id="moverCaja3">

            </div>
            
        </div>

        <div class="card-body row">

            <div class="col-4 moverCaja" id="moverCaja4">
                <div class="row">
                    <div class="col-auto">
                        <p  class="fw-bold fs-5">Paciente:</p>
                    </div>
                    <div class="col-auto">
                        <p class="ms-2 fs-5">Carla Mamani Torres</p>
                    </div>
                </div>
            </div>

            <div class="col-4 moverCaja" id="moverCaja5" style="height: auto;">
                
            </div>

            <div class="col-4 moverCaja" id="moverCaja6">
                <div class="d-flex">
                    <p  class="fw-bold fs-5">Fecha:</p>
                    <p class="ms-2 fs-5">10/05/2022</p>
                </div>
            </div>

            <div class="col-12">
                <div>
                    <p class="fw-bold fs-5">Descripción</p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                </div>
            </div>

        </div>

        <div class="card-footer row">
            

            <div class="col-4 moverCaja" id="moverCaja7">
            
            </div>

            <div class="col-4 moverCaja" id="moverCaja8">
                
            </div>

            <div class="col-4 moverCaja" id="moverCaja9">
                <div class="row mt-3">
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

    <div class="container mt-3">
        <button class="btn btn-primary" id="btn-edit">Editar</button>
        <button class="btn btn-info" id="btn-ver-cuadros">Habilitar cuadros</button>
    </div>

@endsection