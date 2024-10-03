@extends('adminlte::page')

@section('title', 'Crear Roles')

@section('content_header')
    <h1><b>Roles/Registro de un nuevo rol</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar categoria</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/categories', $category->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Nombre de la categoria</label>
                                    <input type="text" name="name" id="name" value="{{ $category->name }}"
                                        class="form-control" placeholder="" required />
                                    @error('name')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Descripción</label>
                                    <input type="text" name="description" id="description"
                                        value="{{ $category->description }}" class="form-control" placeholder="" required />
                                    @error('name')
                                        <small style="background-color: red">{{ $mensaje }}</small>
                                    @enderror

                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i
                                            class="fas fa-save"></i>Actualizar</button>
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
