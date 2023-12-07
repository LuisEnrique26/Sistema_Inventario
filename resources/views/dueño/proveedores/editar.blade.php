@extends('layout/app_dueño')

@section('content')
    <div class="pagetitle">
        <h1>Editar Proveedor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Proveedores</li>
                <li class="breadcrumb-item">Editar Proveedor</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            
            <form class="row g-3" action="{{ route('dueñoactualizarProveedor', ['id' => $proveedor->id_proveedor]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nombre" name="nombre_proveedor" value="{{ $proveedor->nombre_proveedor }}" required>
                        <label for="floatingName">Nombre</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingEmail" placeholder="Dirección" name="direccion_proveedor" value="{{ $proveedor->direccion_proveedor }}" required>
                        <label for="floatingEmail">Drección</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingPassword" placeholder="Teléfono" name="telefono_proveedor" value="{{ $proveedor->telefono_proveedor }}" required>
                        <label for="floatingPassword">Teléfono</label>
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
