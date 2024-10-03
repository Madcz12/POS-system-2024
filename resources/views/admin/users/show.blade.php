@extends('adminlte::page')

@section('title', 'Crear Usuarios')

@section('content_header')
    <h1><b>Usuario Registrado</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Rol:</label>
                                    <p class="">{{ $users->roles->pluck('name')->implode(', ') }}</p>
                                </div>

                                <small id="helpId" class="text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="form-label">Nombre del usuario:</label>
                                <p class="">{{ $users->name }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-label">Correo:</label>
                                <p class="">{{ $users->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="password" class="form-label">Fecha y hora del registro:</label>
                                <p class="">{{ $users->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Volver</a>
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


@stop
