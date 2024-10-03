@extends('adminlte::page')

@section('title', 'Crear Proveedor')

@section('content_header')
    <h1><b>Roles/Registro de un nuevo proveedor</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/suppliers/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Nombre de la empresa</label>
                                    <input type="text" name="ent_name" id="ent_name" value="{{ old('ent_name') }}"
                                        class="form-control" placeholder="" required />
                                    @error('ent_name')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Dirección</label>
                                    <input type="text" name="address" id="address" value="{{ old('address') }}"
                                        class="form-control" placeholder="" required />
                                    @error('address')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Telefono</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="form-control" placeholder="" required />
                                    @error('address')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Correo</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="" required />
                                    @error('address')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Nombre del proveedor</label>
                                    <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}"
                                        class="form-control" placeholder="" required />
                                    @error('address')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="ent_name" class="form-label">Telefono del proveedor</label>
                                    <input type="text" name="owner_phone" id="owner_phone"
                                        value="{{ old('owner_phone') }}" class="form-control" placeholder="" required />
                                    @error('address')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/suppliers') }}" class="btn btn-secondary">Volver</a>
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-save"></i>Registrar</button>
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


@stop
