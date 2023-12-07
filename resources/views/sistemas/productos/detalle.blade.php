@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Detalle del Producto</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Productos</li>
                <li class="breadcrumb-item active">Detalle del Producto</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Descripion</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($productos as $producto)
                                        <th scope="row">{{ $producto->id_producto }}</th>
                                        <td>{{ $producto->nombre_proveedor }}</td>
                                        <td>{{ $producto->nombre_producto }}</td>
                                        <td>{{ $producto->stock_producto }}</td>
                                        <td>{{ $producto->descripcion_producto }}</td>
                                        <td>${{ $producto->precio_producto }}</td>
                                        <td>
                                            <a href="{{ route('editarProducto', ['id' => $producto->id_producto]) }}"><button
                                                class="btn btn-warning">Editar</button></a>&nbsp;
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        <a href="{{ route('listaProductos') }}" class="btn btn-secondary rounded-pill" type="button">Ir a lista</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
