@extends('layout/app_empleado')

@section('content')
    <div class="pagetitle">
        <h1>Generar Venta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Generar Venta</li>
            </ol>
        </nav>
    </div>

    @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <form class="row g-3" action="{{ route('empleadoguardarVenta') }}" method="POST">
                {{ csrf_field() }}
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Empleado" name="id_empleado" required>
                            <option value="@auth {{ Auth::user()->id }} @endauth" selected>@auth {{ Auth::user()->name }} @endauth </option>
                        </select>
                        <label for="floatingSelect">Empleado</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelectProducto" aria-label="Producto" name="id_producto"
                            required>
                            <option selected value="">Elige...</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
                            @endforeach
                        </select>
                        <label for="floatingSelect">Producto</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating" id="precioProducto">
                        <input type="text" class="form-control" id="floatingPrecio" placeholder="Precio" required
                            disabled>
                        <label for="floatingPrecio">Precio</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating" id="cantidad">
                        <input type="number" class="form-control" id="floatingCantidad" placeholder="Cantidad"
                            name="cantidad_venta_detalle" required>
                        <label for="floatingCantidad">Cantidad</label>
                    </div>
                    <div id="mensajeCantidad"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating" id="total">
                        <input type="text" class="form-control" id="floatingTotal" placeholder="Cantidad" disabled>
                        <label for="floatingTotal">Total</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Vender</button>
                    <button type="reset" class="btn btn-secondary">Limpiar</button>
                    <a href="{{ route('empleadolistaVentas') }}" type="button" class="btn btn-warning">Cancelar</a>
                </div>
            </form>

            <script type="text/javascript">
                $(document).ready(function() {
                    $("#floatingSelectProducto").on('change', function() {
                        var id_producto = $(this).find(":selected").val();
                        //console.log(id_producto);
                        if (id_producto >= 1) {
                            $("#precioProducto").load('form_Precio_Producto?id_producto=' + id_producto);
                        } else {
                            $("#precioProducto").html(
                                '<input type="text" class="form-control" id="floatingPrecio" placeholder="Precio" name="precio_producto" required disabled>'
                            );
                        }
                    });

                    $("#cantidad").keyup(function() {
                        var cantidad = $('#floatingCantidad').val();
                        var precio = $('#floatingPrecio').val();
                        var total = cantidad * precio;
                        //console.log(cantidad);
                        //console.log(precio);

                        $("#total #floatingTotal").val(total);
                    });

                    $('#floatingCantidad').on('input', function() {
                        this.value = this.value.replace(/[^0-9]/g, '');
                    });

                });
            </script>

        </div>
    </div>
@endsection
