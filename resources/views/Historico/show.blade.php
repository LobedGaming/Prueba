@extends('Layouts.dashboard')
@section('contenido')
        <table class="table table-primary table-striped">
            <thead>
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha-Hora</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Recetas</th>
              </tr>
            </thead>
            @foreach($citas as $cita)
            <tbody>
              <tr>
                <td> <span>{{$cita->paciente->user->name}}</span></td>
                <td>  <span>{{$cita->fecha_hora}}</span></td>
                <td>  <span>{{$cita->description}}</span></td>
                <td> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Receta</button>
                  @foreach($recetas as $receta)
                  @if($receta->cita_id==$cita->id )
                    
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Nueva Receta</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
          
                        <div class="modal-body">
                          <form action="{{route('receta.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="inputOtros" class="form-label">Descripción</label>
                              <textarea class="form-control" style="resize: none;" id="inputOtros" name="description" id="" cols="30" rows="15" placeholder="Ingrese una descripción">{{$receta->description}}</textarea>
                            </div>
                          </form>
                        </div>
          
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  @endif
                  @endforeach
              </div>
            </td>
              </tr>
            </tbody>
            @endforeach
          </table>

@endsection