<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/estilos.css') }}">
    <title>Clinic-System</title>

    <script src="https://kit.fontawesome.com/871fc34738.js" crossorigin="anonymous"></script>
  </head>
  <body class="panel sombra">
    <aside class="sombra">
        <div class="m-3">
            <h3 class="title-dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heartbeat" width="30" height="30" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                    <path d="M3 13h2l2 3l2 -6l1 3h3" />
                </svg>Clinic-Center
            </h3>
            <span class="fw-bold d-flex justify-content-end">Tu salud primero </span>
        </div>
        @can('admins.index')
        <div class="list-group m-3">
            <div class="mb-3 sombra-claro">
                <button class="btn btn-info collapsed boton-collapsed" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseAdmin">
                    ADMINISTRACION
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-hospital" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="3" y1="21" x2="21" y2="21" />
                    <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                    <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                    <line x1="10" y1="9" x2="14" y2="9" />
                    <line x1="12" y1="7" x2="12" y2="11" />
                </svg>
                </button>
                <div class="collapse " id="collapseAdmin">
                    <div class="list-group list-group-custom card-body">
                      <a class="list-group-item list-group-item-action mb-2" href="{{ route('doctors.index') }}">Gestion Doctores</a> 
                      <a class="list-group-item list-group-item-action mb-2" href="{{ route('secretario.index') }}">Gestion Secretarios</a>
                      <a class="list-group-item list-group-item-action" href="{{ route('admin.index') }}">Gestion Admin</a>
                    </div>
                </div>
            </div>
            @endcan
            <div class="mb-3 sombra-claro">
                <button class="btn btn-info collapsed boton-collapsed" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHistoricoCli" aria-expanded="false" aria-controls="collapseHistoricoCli">
                    HISTORICOS CLINICOS
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <line x1="10" y1="14" x2="14" y2="14" />
                        <line x1="12" y1="12" x2="12" y2="16" />
                    </svg>
                </button>
                
                <div class="collapse " id="collapseHistoricoCli">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            @can('citas.index')
            <div class="mb-3 sombra-claro">
                <button class="btn btn-info collapsed boton-collapsed" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSecretario" aria-expanded="false" aria-controls="collapseSecretario">
                    SECRETARIO
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-like" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <rect x="3" y="16" width="3" height="5" rx="1" />
                      <path d="M6 20a1 1 0 0 0 1 1h3.756a1 1 0 0 0 .958 -.713l1.2 -3c.09 -.303 .133 -.63 -.056 -.884c-.188 -.254 -.542 -.403 -.858 -.403h-2v-2.467a1.1 1.1 0 0 0 -2.015 -.61l-1.985 3.077v4z" />
                      <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                      <path d="M5 12.1v-7.1a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-2.3" />
                    </svg>
                </button>
                
                <div class="collapse " id="collapseSecretario">
                    <div class="card-body">
                      <a href="{{ route('citas.index')}}">Gestionar citas</a><br>
                      <a href="{{ route('patient.index')}}">Gestion Pacientes</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('doctors.agenda')
            <div class="mb-3 sombra-claro">
                <button class="btn btn-info collapsed boton-collapsed" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDoctor" aria-expanded="false" aria-controls="collapseDoctor">
                    DOCTOR
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="32" height="32" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                        <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                    </svg>
                </button>
                
                <div class="collapse " id="collapseDoctor">
                    <div class="card-body">
                      <a href="{{route('citas.citasDoctor', Auth::user()->id)}}">Ver Citas</a>
                    </div>
                </div>
            </div>
            @endcan
            @can('patients.index')
            <div class="mb-3 sombra-claro">
                <button class="btn btn-info collapsed boton-collapsed" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePaciente" aria-expanded="false" aria-controls="collapsePaciente">
                    PACIENTE
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="12" cy="12" r="9" />
                      <circle cx="12" cy="10" r="3" />
                      <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                </button>
                
                <div class="collapse " id="collapsePaciente">
                    <div class="card-body">
                      <a href="#">Mis citas</a>
                    </div>
                </div>
            </div>

            
        </div>
        @endcan
    </aside>

    <div class="container-right">
        
        <nav class="d-flex justify-content-between">
            <a href="">DashBoard</a>
            <div>
            <a href="">Mi cuenta <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
            </svg></a>
            <a href="">Salir <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                  <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                  <path d="M7 12h14l-3 -3m0 6l3 -3" />
                  {{Auth::user()->logout}}
            </svg></a>
         </div>
        </nav>

        <main style="height: 1000px;">
          @yield('contenido')
        </main>

    </div>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>