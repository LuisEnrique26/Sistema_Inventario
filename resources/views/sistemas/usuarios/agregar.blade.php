@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Agragar Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Lista de Usuarios</li>
                <li class="breadcrumb-item active">Agregar Usuario</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            
            <form class="row g-3" action="{{ route('guardarUsuario') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Tipo de Usuario" name="id_tipo_usuario"
                            required>
                            <option selected disabled>Elige...</option>
                            @foreach ($tipo_usuarios as $tipo)
                                <option value="{{ $tipo->id_tipo_usuario }}">{{ $tipo->nombre_tipo_usuario }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Tipo de Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nombre"
                            name="name" required>
                        <label for="floatingName">Nombre</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Correo" name="email"
                            required>
                        <label for="floatingEmail">Correo</label>
                    </div>
                    @error('email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            Email inválido o repetido
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña"
                            name="pass" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
            </form>

        </div>
    </div>
@endsection
