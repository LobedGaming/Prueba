@extends('Layouts.dashboard')

@section('contenido')
    <div class="container">
        <div class="card-header d-flex justify-content-between">
            <p class="fw-bold fs-3 title-clinic align-self-center">Clinic-Center</p>

            <div class="title-doctor">
                <p>Joaquin Chumacero Mamani</p>
                <p>Lic. en Oftalmología</p>
            </div>

            <div class="end"></div>
            
        </div>

        <div class="card div-card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex">
                        <p  class="fw-bold fs-5">Paciente:</p>
                        <p class="ms-2 fs-5">Carla Mamani Torres</p>
                    </div>

                    <div class="d-flex">
                        <p  class="fw-bold fs-5">Fecha:</p>
                        <p class="ms-2 fs-5">10/05/2022</p>
                    </div>
                </div>

                <div class="">
                    <p class="fw-bold fs-5">Descripción</p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus asperiores sit pariatur aliquam quod laborum, nam quas iusto minima rerum totam explicabo eum in quibusdam enim consequuntur eligendi quasi aperiam.
                </div>

                <div class="firm d-flex justify-content-end">
                    <p class="fw-bold fs-5 me-2" style="position: relative; top: 20px;">Firma</p>
                    <input type="text" style="width: 15%; border:0; border-bottom: 2px solid black;"/>
                </div>

            </div>
        </div>
    </div>
@endsection