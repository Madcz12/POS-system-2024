@extends('adminlte::page')

@section('title', 'Mostrar proveedores')

@section('content_header')

    <h1><b>Datos del proveedor:</b></h1>
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
                                            <label for="ent_name" class="form-label">Nombre de la empresa:</label>
                                            <p>{{ $suppliers->ent_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label for="address" class="form-label">Dirección:</label>
                                            <p>{{ $suppliers->address }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <div class="mb-4">
                                            <label for="phone" class="form-label">Teléfono:</label>
                                            <p>{{ $suppliers->phone }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-12">
                                        <div class="mb-12">
                                            <label for="email" class="form-label">Correo:</label>
                                            <p>{{ $suppliers->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="owner_name" class="form-label">Nombre del proveedor:</label>
                                            <p>{{ $suppliers->owner_name }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="mb-2">
                                        <div class="mb-2">
                                            <label for="created_at" class="form-label">Fecha de creación:</label>
                                            <p>{{ $suppliers->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                         <div class="col-md-3">
                            <div class="form-group">
                                <label for="image">Imagen</label>
                                <img src="{{ asset('storage/' . $suppliers->image) }}" width="80px" alt="logo">
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
                        </div> --}}
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/suppliers') }}" class="btn btn-secondary">Volver</a>
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
