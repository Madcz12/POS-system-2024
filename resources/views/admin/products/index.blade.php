@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1><b>Listado de productos</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Productos registrados</b></h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/products/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Crear
                            nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered table-hover-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Categoria</th>
                                <th scope="col" style="text-align: center">Código</th>
                                <th scope="col" style="text-align: center">Nombre</th>
                                <th scope="col" style="text-align: center">Descripción</th>
                                <th scope="col" style="text-align: center; background-color: rgba(233, 231, 16, 0.15)">
                                    Stock</th>
                                <th scope="col" style="text-align: center">Precio de compra</th>
                                <th scope="col" style="text-align: center">Precio de venta</th>
                                <th scope="col" style="text-align: center">Imagen</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($products as $product)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $product->category->name }}</td>
                                    <td style="text-align: center">{{ $product->code }}</td>
                                    <td style="text-align: center">{{ $product->name }}</td>
                                    <td style="text-align: center">{{ $product->description }}</td>
                                    <td style="text-align: center; background-color: rgba(233, 231, 16, 0.15)">
                                        {{ $product->stock }}</td>
                                    <td style="text-align: center">{{ $product->buy_price }}</td>
                                    <td style="text-align: center">{{ $product->sell_price }}</td>
                                    <td style="text-align: center"><img src="{{ asset('storage/' . $product->image) }}"
                                            width="80px" alt="logo"></td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/products', $product->id) }}"
                                                class="btn btn-primary btn-xl"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/admin/products/' . $product->id . '/edit') }}"
                                                class="btn btn-success btn-xl"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ url('/admin/products', $product->id) }}" method="POST"
                                                onclick="askDelete{{ $product->id }}(event)"
                                                id="deleteForm{{ $product->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-xl"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function askDelete{{ $product->id }}(event) {
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
                                                            var form = $('#deleteForm{{ $product->id }}');
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 productos",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ productos",
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
