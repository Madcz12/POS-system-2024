@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1><b>Compras/Listado de compras</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Compras registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/shopping/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Crear
                            nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Producto</th>
                                <th scope="col" style="text-align: center">Fecha</th>
                                <th scope="col" style="text-align: center">Proveedor</th>
                                <th scope="col" style="text-align: center">Precio de compra</th>
                                <th scope="col" style="text-align: center">Cantidad</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($shoppings as $shop)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $shop->date }}</td>
                                    <td style="text-align: center">{{ $shop->name }}</td>
                                    <td style="text-align: center">{{ $shop->stock }}</td>
                                    <td style="text-align: center">{{ $shop->buy_price }}</td>
                                    <td style="text-align: center">{{ $shop->sell_price }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/shopping', $shop->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/admin/shopping/' . $shop->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ url('/admin/shopping', $shop->id) }}" method="POST"
                                                onclick="askDelete{{ $shop->id }}(event)"
                                                id="deleteForm{{ $shop->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function askDelete{{ $shop->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Desea eliminar esta compra?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#deleteForm{{ $shop->id }}');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 compras",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ compras",
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
