@extends('adminlte::page')

@section('title', 'Crear Usuarios')

@section('content_header')
    <h1><b>Roles/Registro de un nuevo usuario</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registro de un nuevo Usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/users/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Rol:</label>
                                        <select class="form-select form-select-lg form-control" name="role"
                                            id="role">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <small id="helpId" class="text-muted">Help text</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Nombre del usuario:</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                        required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="form-label">Correo:</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}" name="email"
                                        required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password" class="form-label">Contrasena:</label>
                                    <input type="password" class="form-control" value="{{ old('password') }}"
                                        name="password" required>
                                    @error('password')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirmacion:</label>
                                    <input type="password" class="form-control" value="{{ old('password_confirmation') }}"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Cancelar</a>
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
