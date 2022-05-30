@extends('Layouts.dashboard')

@section('contenido')
    <h1>Administradores</h1>
    @if (session('info'))
        <div class="col-auto me-3 mb-3 alert alert-success alert-dismissible fade show" role="alert" style="position: absolute; right: 0; bottom: 0;">
            <strong>{{session('info')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <a href="{{route('admin.create')}}">Nuevo Administrador</a>

@endsection