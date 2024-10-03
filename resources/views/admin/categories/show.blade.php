@extends('adminlte::page')

@section('title', 'Crear Categorias')

@section('content_header')
    <h1><b>Categorias/Categoria registrada</b></h1>
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
                                    <label for="role" class="form-label">Categoria:</label>
                                    <p>{{ $category->name }}</p>
                                </div>

                                <small id="helpId" class="text-muted">Help text</small>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="name" class="form-label">Descripción:</label>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="name" class="form-label">Fecha/hora de registro:</label>
                                <p>{{ $category->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/categories') }}" class="btn btn-secondary">Volver</a>
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
