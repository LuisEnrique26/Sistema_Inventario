@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Editar Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Usuarios</li>
                <li class="breadcrumb-item active">Detalle de Usuario</li>
                <li class="breadcrumb-item active">Editar Usuario</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>


            <form class="row g-3" action="{{ route('actualizarUsuario', ['id' => $usuario->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Tipo de Usuario" name="id_tipo_usuario"
                            required>
                            <option selected value="{{ $usuario->id_tipo_usuario }}">{{ $usuario->nombre_tipo_usuario }}
                            </option>
                            @foreach ($tipo_usuarios as $tipo)
                                <option value="{{ $tipo->id_tipo_usuario }}">{{ $tipo->nombre_tipo_usuario }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Tipo de Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nombre" name="name"
                            value="{{ $usuario->name }}" required>
                        <label for="floatingName">Nombre</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="Correo" name="email"
                            value="{{ $usuario->email }}" required>
                        <label for="floatingEmail">Correo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Contraseña"
                            name="pass">
                        <label for="floatingPassword">Ingresa una contraseña sólo si la deseas actualizar</label>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
            </form>

        </div>
    </div>
@endsection
