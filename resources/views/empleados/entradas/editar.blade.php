@extends('layout/app_empleado')

@section('content')
    <div class="pagetitle">
        <h1>Editar Entrada</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Entradas</li>
                <li class="breadcrumb-item active">Detalle de la Entrada</li>
                <li class="breadcrumb-item active">Editar Entrada</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            
            @foreach ($entradas as $entrada)
            <form class="row g-3" action="{{ route('empleadoactualizarEntrada', ['id' => $entrada->id_producto_proveedor]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Usuario" name="id_usuario" required>
                            <option selected value="{{ $entrada->id_usuario }}">{{ $entrada->nombre_usuario }}</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_usuario }}">{{ $usuario->nombre_usuario }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectProveedor" aria-label="Proveedor" name="id_proveedor" required>
                            <option value="{{ $entrada->id_proveedor }}" selected>{{ $entrada->nombre_proveedor }}</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre_proveedor }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Proveedor</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3" id="selectProducto">
                        <select class="form-select" id="floatingSelectProducto" aria-label="Producto" name="id_producto" required>
                            <option value="{{ $entrada->id_producto }}" selected>{{ $entrada->nombre_producto }}</option>
                        </select>
                        <label for="floatingSelectProducto">Producto</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingCosto" placeholder="Costo" name="costo" value="{{ $entrada->costo }}" required>
                        <label for="floatingCosto">Costo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingCantidad" placeholder="Cantidad" value="{{ $entrada->cantidad }}" disabled>
                        <input type="hidden" class="form-control" name="cantidad" value="{{ $entrada->cantidad }}">
                        <label for="floatingCantidad">Cantidad</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
                
            </form>
            @endforeach
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#floatingSelectProveedor").on('change', function() {
                        var id_proveedor = $(this).find(":selected").val();
                        console.log(id_proveedor);
                        if (id_proveedor >= 1) {
                            $("#floatingSelectProducto").load('formProductos?id_proveedor=' + id_proveedor);
                        } else {
                            $("#floatingSelectProducto").html('<option selected>Elige un proveedor</option>');
                        }
                    });

                    $('#floatingCosto').on('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });
                });
            </script>

        </div>
    </div>
@endsection
