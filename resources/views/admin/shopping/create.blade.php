@extends('adminlte::page')

@section('title', 'Crear Compra')

@section('content_header')
    <h1><b>Compras/Registro de una nueva compra</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese los datos:</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/shopping/create') }}" id="formShopping" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="quantity">Cantidad</label>
                                            <input type="number" style="text-align: center; background-color: #ebe7ae"
                                                class="form-control" name="quantity" id="quantity" value="1">
                                            @error('quantity')
                                                <small style="background-color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Código</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                            </div>
                                            <input id="productCode" type="text" name="" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div style="margin-top: 2rem;">
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal"><i class="fas fa-search"></i></button>
                                                {{-- modal --}}
                                                <!-- Button trigger modal -->

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Listado de
                                                                    productos
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table id="example"
                                                                    class="table table-striped table-bordered table-hover-sm table-responsive">
                                                                    <thead class="thead-light">
                                                                        <tr>
                                                                            <th scope="col" style="text-align: center">
                                                                                Nro</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Acción</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Categoria</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Código</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Nombre</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Descripción</th>
                                                                            <th scope="col"
                                                                                style="text-align: center; background-color: rgba(233, 231, 16, 0.15)">
                                                                                Stock</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Precio de compra</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Precio de venta</th>
                                                                            <th scope="col" style="text-align: center">
                                                                                Imagen</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @php
                                                                            $contador = 1;
                                                                        @endphp
                                                                        @foreach ($products as $product)
                                                                            <tr>
                                                                                <td style="text-align: center">
                                                                                    {{ $contador++ }}</td>
                                                                                <td style="text-align: center">
                                                                                    <button type="button"
                                                                                        id="btnSelectProduct"
                                                                                        class="btn btn-info seleccionar-btn"
                                                                                        data-id="{{ $product->code }}">Seleccionar</button>
                                                                                </td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->category->name }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->code }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->name }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->description }}</td>
                                                                                <td
                                                                                    style="text-align: center; background-color: rgba(233, 231, 16, 0.15)">
                                                                                    {{ $product->stock }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->buy_price }}</td>
                                                                                <td style="text-align: center">
                                                                                    {{ $product->sell_price }}</td>
                                                                                <td style="text-align: center"><img
                                                                                        src="{{ asset('storage/' . $product->image) }}"
                                                                                        width="80px" alt="logo"></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ url('/admin/products/create') }}" type="button"
                                                    class="btn btn-success"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-sm table-striped table-bordered table-hover">
                                        <thead>
                                            <tr style="background-color: #cccccc">
                                                <th>Nro</th>
                                                <th>Código</th>
                                                <th>Cantidad</th>
                                                <th>Nombre</th>
                                                <th>Costo</th>
                                                <th>Total</th>
                                                <th>Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $cont = 1;
                                                $quantity_total = 0;
                                                $total_buy = 0;
                                            @endphp

                                            @foreach ($temp_shoppings as $temp_shop)
                                                <tr>
                                                    <td style="text-align: center">{{ $cont++ }}</td>
                                                    <td style="text-align: center">{{ $temp_shop->product->code }}</td>
                                                    <td style="text-align: center">{{ $temp_shop->quantity }}</td>
                                                    <td style="text-align: center">{{ $temp_shop->product->name }}</td>
                                                    <td style="text-align: center">{{ $temp_shop->product->buy_price }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        {{ $cost = $temp_shop->quantity * $temp_shop->product->buy_price }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        <button type="button" class="btn btn-danger btn-xl delete-btn"
                                                            data-id="{{ $temp_shop->id }}"><i
                                                                class="fas fa-trash"></i></button>
                                                    </td>

                                                </tr>
                                                @php
                                                    $quantity_total += $temp_shop->quantity;
                                                    $total_buy += $cost;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2" style="text-align: right"><b>Total Cantidad</b></td>
                                                <td style="text-align: center"><b>{{ $quantity_total }}</b></td>
                                                <td colspan="2" style="text-align: right"><b>Total compra</b></td>
                                                <td style="text-align: center"><b>{{ $total_buy }}</b></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal_proveedor"><i class="fas fa-search"></i>Buscar
                                            proveedor</button>
                                        {{-- modal proveedor --}}
                                        <!-- Button trigger modal -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_proveedor" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Listado de
                                                            proveedores
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table id="table2"
                                                            class="table table-striped table-bordered table-hover-sm table-responsive">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th scope="col" style="text-align: center">
                                                                        Nro</th>
                                                                    <th scope="col" style="text-align: center">
                                                                        Acción</th>
                                                                    <th scope="col" style="text-align: center">
                                                                        Empresa</th>
                                                                    <th scope="col" style="text-align: center">
                                                                        Telefono</th>
                                                                    <th scope="col" style="text-align: center">
                                                                        Nombre del propietario</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $contador = 1;
                                                                @endphp
                                                                @foreach ($suppliers as $supplier)
                                                                    <tr>
                                                                        <td style="text-align: center">
                                                                            {{ $contador++ }}</td>
                                                                        <td style="text-align: center">
                                                                            <button type="button" id="btnSelectProduct"
                                                                                class="btn btn-info seleccionar-btn-supplier"
                                                                                data-id="{{ $supplier->id }}"
                                                                                data-enterprise="{{ $supplier->ent_name }}">Seleccionar</button>
                                                                        </td>
                                                                        <td style="text-align: center">
                                                                            {{ $supplier->ent_name }}</td>
                                                                        <td style="text-align: center">
                                                                            {{ $supplier->phone }}</td>
                                                                        <td style="text-align: center">
                                                                            {{ $supplier->owner_name }}</td>

                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="enterprise_supplier" disabled>
                                        <input type="text" class="form-control" id="id_enterprise" hidden>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date">Fecha de compra</label>
                                            <input type="date" class="form-control" name="date" id="date"
                                                value="{{ old('date') }}">
                                            @error('date')
                                                <small style="background-color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="voucher">Comprobante</label>
                                            <input type="text" class="form-control" name="voucher" id="voucher"
                                                value="{{ old('voucher') }}">
                                            @error('voucher')
                                                <small style="background-color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="date">Precio total</label>
                                            <input type="text" class="form-control" name="total_price"
                                                id="total_price" value="{{ $total_buy }}"
                                                style="text-align: center; background: chartreuse">
                                            @error('total_price')
                                                <small style="background-color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i
                                                class="fas fa-save"></i>Registrar compra</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
        $('.seleccionar-btn-supplier').click(function(e) {
            var id_proveedor = $(this).data('id');
            var enterprise = $(this).data('enterprise');
            $('#enterprise_supplier').val(enterprise);
            $('#id_enterprise').val(id_proveedor);
            $('#exampleModal_proveedor').modal('hide');

        });
        $('.seleccionar-btn').click(function(e) {
            var id_product = $(this).data('id');
            $('#productCode').val(id_product);
            $('#exampleModal').modal('hide');
            $('#exampleModal').on('hidden.bs.modal', function() {
                $('#productCode').focus();
            });

        });

        $('.delete-btn').click(function(e) {
            //alert("dsadsa");
            var id = $(this).data('id');
            //alert(id);
            if (id) {
                $.ajax({
                    url: "{{ url('/admin/shopping/create/tmp/') }}/" + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        _method: 'DELETE',
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                position: "top-end",
                                icon: "success",
                                title: "Se eliminó el producto",
                                showConfirmButton: false,
                                timer: 1500
                            });
                            location.reload();
                        } else {
                            alert('error! no se puedo eliminar');
                        }
                    },
                    error: function(err) {
                        alert(err);
                    }
                });
            }
        });

        $('#code').focus();
        // para que se refresque la página al ingresar un producto a la tabla de compras temporales
        $('#formShopping').on('keypress', function() {
            if (e.keyCode === 13) {
                e.preventDefault();
            }
        });
        // inserta un producto en la tabla temporal
        $('#productCode').on('keyup', function(e) {
            if (e.which === 13) {
                var code = $(this).val();
                var quantity = $('#quantity').val();

                if (code.length > 0) {
                    $.ajax({
                        url: "{{ route('admin.shopping.tmp_shoppings') }}",
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            code: code,
                            quantity: quantity,
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "Producto incorporado!",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload();
                            } else {
                                alert('no se encontró al producto');
                            }
                        },
                        error: function(err) {
                            alert(err);
                        }
                    });
                }
            }
        });
    </script>
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

        $('#table2').DataTable({
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
