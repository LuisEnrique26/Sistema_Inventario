@extends('layout/app_empleado')

@section('content')
    <div class="pagetitle">
        <h1>Agregar Producto</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Productos</li>
                <li class="breadcrumb-item active">Agregar Producto</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            
            <form class="row g-3" action="{{ route('empleadoguardarProducto') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Proveedor" name="id_proveedor" required>
                            <option selected disabled>Elige...</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Proveedor</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" placeholder="Nombre" name="nombre_producto" required>
                        <label for="floatingName">Nombre</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingEmail" placeholder="Stock" name="stock_producto" required>
                        <label for="floatingEmail">Stock</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Descricpion" name="descripcion_producto" required>
                        <label for="floatingPassword">Descripción</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Precio" name="precio_producto" required>
                        <label for="floatingPassword">Precio</label>
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
