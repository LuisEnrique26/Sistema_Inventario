@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Agregar Proveedor</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Agregar Proveedor</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('guardarProveedor') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nombre" name="nombre_proveedor" required>
                        <label for="floatingName">Nombre</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingEmail" placeholder="Dirección" name="direccion_proveedor" required>
                        <label for="floatingEmail">Drección</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingPassword" placeholder="Teléfono" name="telefono_proveedor" required>
                        <label for="floatingPassword">Teléfono</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
            </form><!-- End floating Labels Form -->

        </div>
    </div>
@endsection
