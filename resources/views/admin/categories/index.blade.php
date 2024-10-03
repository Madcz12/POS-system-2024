@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1><b>Listado de categorias</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Categorias registradas</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/categories/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Crear
                            nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Nombre de la categoria</th>
                                <th scope="col" style="text-align: center">Descripción</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($categories as $cat)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $cat->name }}</td>
                                    <td style="text-align: center">{{ $cat->description }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/categories', $cat->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="{{ url('/admin/categories/' . $cat->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ url('/admin/categories', $cat->id) }}" method="POST"
                                                onclick="askDelete{{ $cat->id }}(event)"
                                                id="deleteForm{{ $cat->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function askDelete{{ $cat->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Desea eliminar esta categoria? Si eliminas esta categoria, todos los productos que pertenecen a esta categoria se eliminaran',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#deleteForm{{ $cat->id }}');
                                                            form.submit();
                                                        }
                                                    });
                                                }
                                            </script>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
