@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Lista de Entradas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Entradas</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="d-grid gap-2 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ route('formularioEntrada') }}">Entrada de Productos</a>
                        </div>
            
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($entradas as $entrada)
                                    <tr>
                                        <th scope="row">{{ $entrada->id_producto_proveedor }}</th>
                                        <td>{{ $entrada->nombre_producto }}</td>
                                        <td>{{ $entrada->nombre_proveedor }}</td>
                                        <td>{{ $entrada->nombre_usuario }}</td>
                                        <td>{{ $entrada->fecha }}</td>
                                        <td>
                                            <a href="{{ route('mostrarEntrada', ['id' => $entrada->id_producto_proveedor]) }}"><button
                                                    class="btn btn-info">Detalle</button></a>&nbsp;
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $entrada->id_producto_proveedor }}">Eliminar</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal-{{ $entrada->id_producto_proveedor }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Estás seguro de
                                                        eliminar este
                                                        registro?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{ $entrada->id_producto_proveedor }} -
                                                    {{ $entrada->nombre_proveedor }} -
                                                    {{ $entrada->nombre_producto }} -
                                                    {{ $entrada->fecha }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <a
                                                        href="{{ route('eliminarEntrada', ['id' => $entrada->id_producto_proveedor]) }}"><button
                                                            class="btn btn-danger">Eliminar</button></a>&nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection