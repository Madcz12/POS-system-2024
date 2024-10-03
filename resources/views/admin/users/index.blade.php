@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Listado de usuarios</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuarios registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/users/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Crear
                            nuevo</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover-sm">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align: center">Nro</th>
                                <th scope="col" style="text-align: center">Nombre del usuario</th>
                                <th scope="col" style="text-align: center">Rol del usuario</th>
                                <th scope="col" style="text-align: center">Correo</th>
                                <th scope="col" style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 1;
                            @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td style="text-align: center">{{ $contador++ }}</td>
                                    <td style="text-align: center">{{ $user->name }}</td>
                                    <td style="text-align: center">{{ $user->roles->pluck('name')->implode(', ') }}</td>
                                    <td style="text-align: center">{{ $user->email }}</td>
                                    <td style="text-align: center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/users', $user->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ url('/admin/users/' . $user->id . '/edit') }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil"></i></a>
                                            <form action="{{ url('/admin/users', $user->id) }}" method="POST"
                                                onclick="askDelete{{ $user->id }}(event)"
                                                id="deleteForm{{ $user->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="" class="btn btn-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                            <script>
                                                function askDelete{{ $user->id }}(event) {
                                                    event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Desea eliminar este usuario?',
                                                        text: '',
                                                        icon: 'question',
                                                        showDenyButton: true,
                                                        confirmButtonText: 'Eliminar',
                                                        confirmButtonColor: '#a5161d',
                                                        denyButtonColor: '#270a0a',
                                                        denyButtonText: 'Cancelar',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            var form = $('#deleteForm{{ $user->id }}');
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
