@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Lista de Proveedores</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Proveedores</li>
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
                            <a type="button" class="btn btn-primary" href="{{ route('formularioProveedor') }}">Agregar Proveedor</a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr>
                                        <th scope="row">{{ $proveedor->id_proveedor }}</th>
                                        <td>{{ $proveedor->nombre_proveedor }}</td>
                                        <td>{{ $proveedor->direccion_proveedor }}</td>
                                        <td>{{ $proveedor->telefono_proveedor }}</td>
                                        <td>
                                            <a href="{{ route('editarProveedor', ['id' => $proveedor->id_proveedor]) }}"><button
                                                    class="btn btn-warning">Editar</button></a>&nbsp;
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal-{{ $proveedor->id_proveedor }}">Eliminar</button>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="exampleModal-{{ $proveedor->id_proveedor }}" tabindex="-1"
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
                                                    {{ $proveedor->id_proveedor }} -
                                                    {{ $proveedor->nombre_proveedor }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                    <a
                                                        href="{{ route('eliminarProveedor', ['id' => $proveedor->id_proveedor]) }}"><button
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
