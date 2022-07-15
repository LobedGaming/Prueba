<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/features/">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
    <link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/grid.css"')}}">
    <link rel="stylesheet" href="{{asset('css/modal.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('sidebars.js')}}"></script>
    <title>Clinic-System</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/"> 
<link href="{{asset('assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }
      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>    
  </head>
  <body>    
<header>
  <div class="navbar navbar-dark bg-primary shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ambulance" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="7" cy="17" r="2" />
            <circle cx="17" cy="17" r="2" />
            <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5" />
            <path d="M6 10h4m-2 -2v4" />
          </svg>
        <strong>Clinic-System Software</strong>
      </a>
    </div>
  </div>
</header>
<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light"><strong>Clinic-System</strong></h1>
        <p class="lead text-muted">"El médico competente, antes de dar una medicina a su paciente, se familiariza no sólo con la enfermedad que desea curar, sino también con los hábitos y la constitución del enfermo. (Marco Tulio Cicerón)"
            <br><strong>¡SOMOS TU MEJOR DECISION!</strong> <br>
        </p>
        <p>
           <a href="/login" class="btn btn-success my-2">Iniciar sesion</a>
          
        </p>
      </div>
    </div>
  </section>
 
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <div class="col">
          <div class="card shadow-sm">
            
            <div class="card-body">
            <img src="{{Storage::url('public/chicoclinica.jpg')}}" alt="" style="width: 24rem; height: 20rem"><br>
            <strong>Plan Basico</strong>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/register/1" class="btn btn-sm btn-outline-warning">Registrarse</a>                 
                </div>             
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
                <img src="{{Storage::url('public/chicohistoria.jpg')}}" alt="" style="width: 24rem; height: 20rem"><br>
                <strong>Plan Estandar</strong>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/register/2" class="btn btn-sm btn-outline-warning">Registrarse</a>               
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <div class="card-body">
                <img src="{{Storage::url('public/chicoprofesional.jpeg')}}" alt="" style="width: 24rem; height: 20rem"><br>
                <strong>Plan Profesional</strong>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="/register/3" class="btn btn-sm btn-outline-warning">Registrarse</a>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>

<footer class="text-white py-5 bg-dark">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Clinic System is &copy; UAGRM , but please download and customize it for yourself!</p>
  </div>
</footer>


    <script src="{{asset('assets/dist/js/bootstrap.bundle.min.js')}}"></script>

      
  </body>
</html>
