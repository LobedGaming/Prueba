<!doctype html>
<html lang="en">
  <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('estilos/estilos.css') }}">
    <script src="https://kit.fontawesome.com/871fc34738.js" crossorigin="anonymous"></script>
    <title>Clinic-System</title>
  </head>
  <body class="panel sombra">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <aside class="sombra">
        <div class="m-3">
            <h3 class="title-dashboard">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heartbeat" width="30" height="30" viewBox="0 0 24 24" stroke-width="2.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M19.5 13.572l-7.5 7.428l-2.896 -2.868m-6.117 -8.104a5 5 0 0 1 9.013 -3.022a5 5 0 1 1 7.5 6.572" />
                    <path d="M3 13h2l2 3l2 -6l1 3h3" />
                </svg>Clinic-Center
            </h3>
            <span class="font-weight-bold d-flex justify-content-end">Tu salud primero </span>
        </div>
    </section>
<div class="nav-bg"> 
    <nav class="nav-principal contenedor ">
        <a href="">DashBoard</a>
        <a href="">Mi cuenta <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg></a>
    </nav>
</div>
<div class="menu-contenido">
  
   <section class="panel sombra">
    <nav>
        <ul>
            <li >
                <div id="">
                    <div class="sombra-claro">
                      <div id="headingTwo">
                        <h5 class="mb-0">
                          @can('admins.index')
                          <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                          @endcan
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="" data-parent="#accordion">
                        <div class="card-body">
                           <a class="a-text" href="{{ route('doctors.index') }}">Gestion Doctores</a> <br>
                           <a class="a-text" href="{{ route('secretario.index') }}">Gestion Secretarios</a>
                        </div>
                      </div>
                    </div>
                </div>
            </li>
            <li >
              <div id="">
                  <div class="sombra-claro">
                    <div id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapseTree" aria-expanded="false" aria-controls="collapseTwo">
                          HISTORICOS CLINICOS <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                            <rect x="9" y="3" width="6" height="4" rx="2" />
                            <line x1="10" y1="14" x2="14" y2="14" />
                            <line x1="12" y1="12" x2="12" y2="16" />
                          </svg>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTree" class="collapse" aria-labelledby="" data-parent="#accordion">
                      <div class="card-body">
                      </div>
                    </div>
                  </div>
                </div>
            </div>

            <div class="mb-2" id="">
                <div class="sombra-claro">
                  <div id="headingTwo">
                    <h5 class="mb-0">
                    @can('citas.index')
                      <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseTwo">
                        SECRETARIO
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-like" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                          <rect x="9" y="3" width="6" height="4" rx="2" />
                          <line x1="10" y1="14" x2="14" y2="14" />
                          <line x1="12" y1="12" x2="12" y2="16" />
                        </svg>
                      </button>
                      @endcan
                    </h5>
                  </div>
                  <div id="collapseTree" class="collapse" aria-labelledby="" data-parent="#accordion">
                    <div class="card-body">
                    </div>
                  </div>
                </div>
            </div>

            <div class="mb-2" id="">
                <div class="sombra-claro">
                <div id="headingTwo">
                  <h5 class="mb-0">
                    @can('doctors.agenda')
                    <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                      DOCTOR<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="32" height="32" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <rect x="3" y="16" width="3" height="5" rx="1" />
                        <path d="M6 20a1 1 0 0 0 1 1h3.756a1 1 0 0 0 .958 -.713l1.2 -3c.09 -.303 .133 -.63 -.056 -.884c-.188 -.254 -.542 -.403 -.858 -.403h-2v-2.467a1.1 1.1 0 0 0 -2.015 -.61l-1.985 3.077v4z" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path d="M5 12.1v-7.1a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2h-2.3" />
                        </svg>
                    </button>
                    @endcan
                  </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="" data-parent="#accordion">
                  <div class="card-body">
                    <a href="{{route('citas.citasDoctor', Auth::user()->id) }}">Mi Agenda</a>
                  </div>
                </div>
              </div>
          </div>
      </li>
      <li >
        <div id="">
            <div class="sombra-claro">
              <div id="headingTwo">
                <h5 class="mb-0">
                  @can('patients.index')
                  <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapseTwo">
                    PACIENTE <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <circle cx="12" cy="12" r="9" />
                      <circle cx="12" cy="10" r="3" />
                      <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                    </svg>
                  </button>
                  @endcan
                </h5>
              </div>
              <div id="collapsesix" class="collapse" aria-labelledby="" data-parent="#accordion">
                <div class="card-body">
                  <a href="">Mis citas</a>
                </div>
            </div>

            <div class="mb-2" id="">
                <div class="sombra-claro">
                    <div id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
                        DOCTOR<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pill" width="32" height="32" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4.5 12.5l8 -8a4.94 4.94 0 0 1 7 7l-8 8a4.94 4.94 0 0 1 -7 -7" />
                            <line x1="8.5" y1="8.5" x2="15.5" y2="15.5" />
                        </svg>
                        </button>
                    </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="" data-parent="#accordion">
                    <div class="card-body">
                        <form action="{{route('citas.citasDoctor')}}" method="POST">
                        @csrf
                        <input type="hidden" value="1" name="id">
                        <button  type="submit" class="btn btn-link">Mis citas</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>

            <div class="mb-2" id="">
                <div class="sombra-claro">
                <div id="headingTwo">
                    <h5 class="mb-0">
                    <button class="btn btn-info collapsed boton-collapsed" style="width: 100%" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapseTwo">
                        PACIENTE <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="9" />
                        <circle cx="12" cy="10" r="3" />
                        <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </button>
                    </h5>
                </div>
                <div id="collapsesix" class="collapse" aria-labelledby="" data-parent="#accordion">
                    <div class="card-body">
                    <a href="#">Mis citas</a>
                    </div>
                </div>
                </div>
            </div>

        </div>
    </aside>

    <div class="container-right">
        
        <nav class="d-flex justify-content-between">
            <a href="">DashBoard</a>
            <a href="">Mi cuenta <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <circle cx="12" cy="7" r="4" />
                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg></a>
        </nav>

        <main>
            <div style="height: 1000px;">
              @yield('contenido')
            </div>
        </main>

    </div>
</body>
</html>