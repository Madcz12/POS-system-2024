@extends('adminlte::page')

@section('title', 'Crear Productos')

@section('content_header')

    <h1><b>Datos del producto</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title"><b>datos registrados:</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label for="role" class="form-label">Categoria:</label>
                                            <p>{{ $product->category->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label for="code" class="form-label">Código:</label>
                                            <p>{{ $product->code }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label for="code" class="form-label">Nombre del producto:</label>
                                            <p>{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <div class="mb-12">
                                            <label for="description" class="form-label">Descripción:</label>
                                            <p>{{ $product->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="stock" class="form-label">Stock:</label>
                                            <input type="text" value="{{ $product->stock }}"
                                                style="width: 50px; text-align: center; background-color: rgba(233, 231, 16, 0.15)"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="min_stock" class="form-label">Stock minimo:</label>
                                            <p>{{ $product->min_stock }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="max_stock" class="form-label">Stock Máximo:</label>
                                            <p>{{ $product->max_stock }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="buy_price" class="form-label">Precio de compra:</label>
                                            <p>{{ $product->buy_price }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="sell_price" class="form-label">Precio de venta:</label>
                                            <p>{{ $product->sell_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <img src="{{ asset('storage/' . $product->image) }}" width="80px" alt="logo">
                                <br>
                                <center id="list"></center>
                                <script>
                                    function archivo(evt) {
                                        var files = evt.target.files; //file List objet
                                        //Obtenemos la imagen del campo "file"
                                        for (var i = 0, f; f = files[i]; i++) {
                                            //solo admitimos imagenes
                                            if (!f.type.match('image.*')) {
                                                continue;
                                            }
                                            var reader = new FileReader();
                                            reader.onload = (function(theFile) {
                                                return function(e) {
                                                    //insertamos la imagen
                                                    document.getElementById("list").innerHTML = ['<img class="thumb thumbail" src="', e
                                                        .target.result, '" widtch="70%" title="', escape(theFile.name), '"/>'
                                                    ].join('');
                                                };
                                            })(f);
                                            reader.readAsDataURL(f);

                                        }

                                    }
                                    document.getElementById('logo-file').addEventListener('change', archivo, false);
                                </script>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/products') }}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stop
