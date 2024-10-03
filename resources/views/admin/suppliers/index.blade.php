@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1><b>Listado de proveedores</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Proveedores registrados</b></h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/suppliers/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Crear
                            nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered table-hover-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Empresa</th>
                                <th scope="col" style="text-align: center">Dirección</th>
                                <th scope="col" style="text-align: center">Teléfono</th>
                                <th scope="col" style="text-align: center">Correo</th>
                                <th scope="col" style="text-align: center">Nombre del proveedor</th>
                                <th scope="col" style="text-align: center">Celular del proveedor</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $supplier->ent_name }}</td>
                                    <td style="text-align: center">{{ $supplier->address }}</td>
                                    <td style="text-align: center">{{ $supplier->phone }}</td>
                                    <td style="text-align: center">{{ $supplier->email }}</td>
                                    <td style="text-align: center">{{ $supplier->owner_name }}</td>
                                    <td style="text-align: center"><a
                                            href="https://wa.me/{{ $enterprise->post_code . '' . $supplier->phone }}"
                                            class="btn btn-success"><i class="fas fa-phone"></i>
                                            {{ $enterprise->post_code . '' . $supplier->owner_phone }}</a>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/suppliers', $supplier->id) }}"
                                                class="btn btn-primary btn-xl"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/admin/suppliers/' . $supplier->id . '/edit') }}"
                                                class="btn btn-success btn-xl"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ url('/admin/suppliers', $supplier->id) }}" method="POST"
                                                onclick="askDelete{{ $supplier->id }}(event)"
                                                id="deleteForm{{ $supplier->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-xl"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function askDelete{{ $supplier->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Desea eliminar este registro?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#deleteForm{{ $supplier->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
        $('#example').DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 proveedores",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ proveedores",
                "loadingRecords": "Cargando...",
                "search": "Buscador: ",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
        });
    </script>


@stop
