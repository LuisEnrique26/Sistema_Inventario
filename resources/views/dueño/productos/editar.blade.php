@extends('layout/app_dueño')

@section('content')
    <div class="pagetitle">
        <h1>Editar Producto</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Productos</li>
                <li class="breadcrumb-item active">Detalle del Producto</li>
                <li class="breadcrumb-item active">Editar Producto</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <!-- Floating Labels Form -->
            @foreach ($productos as $producto)
                <form class="row g-3" action="{{ route('dueñoactualizarProducto', ['id' => $producto->id_producto]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Proveedor" name="id_proveedor" required>
                                <option value="{{ $producto->id_proveedor }}" selected>{{ $producto->nombre_proveedor }}</option>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Proveedor</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingName" placeholder="Nombre"
                                name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
                            <label for="floatingName">Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="floatingEmail" placeholder="Stock"
                                name="stock_producto" value="{{ $producto->stock_producto }}" required>
                            <label for="floatingEmail">Stock</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Descricpion"
                                name="descripcion_producto" value="{{ $producto->descripcion_producto }}" required>
                            <label for="floatingPassword">Descripción</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Precio"
                                name="precio_producto" value="{{ $producto->precio_producto }}" required>
                            <label for="floatingPassword">Precio</label>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                        <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                    </div>
                </form>
            @endforeach

        </div>
    </div>
@endsection
