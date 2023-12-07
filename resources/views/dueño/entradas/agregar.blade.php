@extends('layout/app_dueño')

@section('content')
    <div class="pagetitle">
        <h1>Agregar Entrada</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Agregar Entrada</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" action="{{ route('dueñoguardarEntrada') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Usuario" name="id_usuario" required>
                            <option value="@auth {{ Auth::user()->id }} @endauth" selected>@auth {{ Auth::user()->name }} @endauth </option>
                        </select>
                        <label for="floatingSelect">Usuario</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectProveedor" aria-label="Proveedor" name="id_proveedor" required>
                            <option selected>Elige...</option>
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
                            <option selected>Elige un proveedor</option>
                        </select>
                        <label for="floatingSelectProducto">Producto</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingCosto" placeholder="Costo" name="costo" required>
                        <label for="floatingCosto">Costo</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="floatingCantidad" placeholder="Cantidad" name="cantidad" required>
                        <label for="floatingCantidad">Cantidad</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrar</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ url()->previous() }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
            </form><!-- End floating Labels Form -->

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

                    $('#floatingCantidad').on('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });

                    $('#floatingCosto').on('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });
                });
            </script>

        </div>
    </div>
@endsection
