@extends('adminlte::page')

@section('title', 'Crear Productos')

@section('content_header')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <h1><b>Productos/Registro de un nuevo producto</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Ingrese los datos:</b></h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/products/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label for="role" class="form-label">Categoria:</label>
                                                <select class="form-select form-select-lg form-control" name="category_id"
                                                    id="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label for="role" class="form-label">Código:</label>
                                                <input type="text" name="code" id="code" class="form-control"
                                                    value="{{ old('code') }}" required>
                                                @error('code')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <div class="mb-4">
                                                <label for="role" class="form-label">Nombre del producto:</label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="{{ old('name') }}" required>
                                                @error('name')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-12">
                                            <div class="mb-12">
                                                <label for="stock" class="form-label">Descripción:</label>
                                                <textarea class="form-control" name="description" id="description" rows="3" style="resize: none"></textarea>
                                                @error('stock')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Stock:</label>
                                                <input type="number" name="stock" id="stock" class="form-control"
                                                    value="0" required>
                                                @error('stock')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Stock minimo:</label>
                                                <input type="number" name="min_stock" id="min_stock" class="form-control"
                                                    value="0" required>
                                                @error('min_stock')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Stock Máximo:</label>
                                                <input type="number" name="max_stock" id="max_stock" class="form-control"
                                                    value="0" required>
                                                @error('max_stock')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Precio de compra:</label>
                                                <input type="text" name="buy_price" id="buy_price" class="form-control"
                                                    value="{{ old('buy_price') }}" required>
                                                @error('buy_price')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-2">
                                            <div class="mb-2">
                                                <label for="stock" class="form-label">Precio de venta:</label>
                                                <input type="text" name="sell_price" id="sell_price"
                                                    class="form-control" value="{{ old('sell_price') }}" required>
                                                @error('sell_price')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="image">Imagen</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="image"
                                        id="logo-file">
                                    @error('logo')
                                        <small id="helpId" class="form-text text-muted" style="color:red">
                                            {{ $message }}
                                        </small>
                                    @enderror

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
                                        <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fas fa-save"></i>Registrar</button>
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
