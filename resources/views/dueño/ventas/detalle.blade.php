@extends('layout/app_dueño')

@section('content')
    <div class="pagetitle">
        <h1>Detalle de Venta</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item">Ventas</li>
                <li class="breadcrumb-item">Detalle de Venta</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        
                        <div class="d-grid gap-2 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ route('dueñoformularioVenta') }}">Generar Venta</a>
                        </div>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Empleado</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ventaDetalle as $ventaD)
                                    <tr>
                                        <th scope="row">{{ $ventaD->id_venta_detalle }}</th>
                                        <td>{{ $ventaD->name }}</td>
                                        <td>{{ $ventaD->fecha_venta }}</td>
                                        <td>{{ $ventaD->hora_venta }}</td>
                                        <td>{{ $ventaD->nombre_producto }}</td>
                                        <td>${{ $ventaD->precio_producto }}</td>
                                        <td>{{ $ventaD->cantidad_venta_detalle }}</td>
                                        <td>${{ $ventaD->precio_producto * $ventaD->cantidad_venta_detalle }}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $ventaD->id_venta_detalle }}">Eliminar</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal-{{ $ventaD->id_venta_detalle }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Estás
                                                        seguro de eliminar esta venta?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $ventaD->id_venta_detalle }} -
                                                    {{ $ventaD->nombre_producto }} -
                                                    Piezas {{ $ventaD->cantidad_venta_detalle }} -
                                                    Venta ${{ $ventaD->precio_producto * $ventaD->cantidad_venta_detalle }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <a
                                                        href="{{ route('dueñoeliminarVenta', ['id' => $ventaD->id_venta_detalle, 'idV' => $ventaD->id_venta]) }}"><button
                                                            class="btn btn-danger">Eliminar</button></a>&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('dueñolistaVentas') }}" class="btn btn-secondary rounded-pill" type="button">Ir a lista</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
