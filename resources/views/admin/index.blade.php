@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido {{ $enterprise->name }}</b></h1>
@stop

@section('content')
    <p>
        @if ($message = Session::get('mensaje'))
            {{ $message }}
        @endif
    </p>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomp">
                <a href="{{ url('/admin/roles') }}" class="info-box-icon bg-info">
                    <span><i class="fas fa-user-check"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Roles:</span>
                    <span class="info-box-number">{{ $total_roles }} roles</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomp">
                <a href="{{ url('/admin/users') }}" class="info-box-icon bg-primary">
                    <span><i class="fas fa-user-check"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios:</span>
                    <span class="info-box-number">{{ $total_users }} usuarios</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomp">
                <a href="{{ url('/admin/categories') }}" class="info-box-icon bg-warning">
                    <span><i class="fas fa-tags"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Categorias:</span>
                    <span class="info-box-number">{{ $total_categories }} categorias</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomp">
                <a href="{{ url('/admin/products') }}" class="info-box-icon bg-success">
                    <span><i class="fas fa-list"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Productos:</span>
                    <span class="info-box-number">{{ $total_products }} productos</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomp">
                <a href="{{ url('/admin/suppliers') }}" class="info-box-icon bg-danger">
                    <span><i class="fas fa-list"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-text">Proveedores:</span>
                    <span class="info-box-number">{{ $total_suppliers }} proveedores</span>
                </div>
            </div>
        </div>
    </div>

    <a href="#"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">Noteworthy technology acquisitions
            2021</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of
            2021 so far, in reverse chronological order.</p>
    </a>

    <br>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    --
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <style>
        .zoomp {
            transition: width 1.1s, height 1.1ms, transform 1.1s;
            -moz-transition: width 1.1s, height 1.1s, -moz-transform 1.1s;
            -webkit-transition: width 1.1s, height 1.1s, -webkit-transform 1.1s;
            border: 1px solid #c0c0c0;
            box-shadow: #c0c0c0 0px 5px 5px 0px;
        }

        .zoomp:hover {
            transform: scale(1.05);
            -webkit-transform: scale(1.05);
            transform: scale(1.05)
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
        $('#example').DataTable({

        });
    </script>
    @if (($mensaje = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "{{ $icono }}",
                title: "{{ $mensaje }}",
                showConfirmButton: false,
                timer: 4000
            });
        </script>
    @endif

@stop
