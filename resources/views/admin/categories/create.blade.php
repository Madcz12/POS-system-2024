@extends('adminlte::page')

@section('title', 'Crear Categorias')

@section('content_header')
    <h1><b>Categorias/Registro de una nueva categoria</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Registro de una nueva categoria</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/categories/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Categoria:</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            name="name" required>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <small id="helpId" class="text-muted">Help text</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class="form-label">Descripción:</label>
                                    <input type="text" class="form-control" value="{{ old('description') }}"
                                        name="description" required>
                                    @error('description')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
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
