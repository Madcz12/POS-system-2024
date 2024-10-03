@extends('adminlte::page')

@section('content_header')
    <h1><b>Configuraciones: Editar</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- Card Box --}}
            <div class="card card-success" style="box-shadow: 5px 5px 5px #cccccc" class="">

                {{-- Card Header --}}
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none">
                        <b>Datos registrados</b>
                    </h3>
                </div>


                {{-- Card Body --}}
                <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                    <form action="{{ url('/admin/config', $enterprise->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="logo"
                                        id="logo-file">
                                    @error('logo')
                                        <small id="helpId" class="form-text text-muted" style="color:red">
                                            {{ $message }}
                                        </small>
                                    @enderror

                                    <br>
                                    <center>
                                        <output id="list">
                                            <img src="{{ asset('storage/' . $enterprise->logo) }}" width="80%"
                                                alt="logo">
                                        </output>
                                    </center>
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
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <div class="mb-4">
                                                <label for="country" class="form-label">Pais</label>
                                                <select class="form-control" name="country" id="select_country">
                                                    <option selected disabled>Seleccione un pais</option>
                                                    @foreach ($country as $c)
                                                        <option value="{{ $c->id }}"
                                                            {{ $enterprise->country == $c->id ? 'selected' : '' }}>
                                                            {{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Estado/Departamento</label>
                                            <select class="form-control" name="state" id="select_state">
                                                <option selected disabled>Seleccione un pais</option>
                                                @foreach ($select_state as $sel_state)
                                                    <option value="{{ $sel_state->id }}"
                                                        {{ $enterprise->state == $sel_state->id ? 'selected' : '' }}>
                                                        {{ $sel_state->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="response_country">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Ciudades</label>
                                            <select class="form-control" name="state" id="select_state">
                                                <option selected disabled>Seleccione un pais</option>
                                                @foreach ($select_city as $sel_city)
                                                    <option value="{{ $sel_city->id }}"
                                                        {{ $enterprise->city == $sel_city->id ? 'selected' : '' }}>
                                                        {{ $sel_city->name }}</option>
                                                @endforeach
                                            </select>
                                            <div id="response_state">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">


                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Tipo de la empresa</label>
                                            <input type="text" class="form-control" name="ent_type" id="ent_type"
                                                value="{{ $enterprise->ent_type }}" aria-describedby="helpId"
                                                placeholder="Tipo de la empresa" required />
                                            @error('type')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Tipo de la
                                                empresa</small>
                                        </div>

                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nombre de la empresa</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ $enterprise->name }}" aria-describedby="helpId"
                                                placeholder="Nombre de la
                                            empresa"
                                                required />
                                            @error('name')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Nombre de la
                                                empresa</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="nit" class="form-label">NIT</label>
                                            <input type="text" class="form-control" name="nit" id="nit"
                                                value="{{ $enterprise->nit }}" aria-describedby="helpId" placeholder="nit"
                                                required />
                                            @error('nit')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">nit</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="currency" class="form-label">Moneda</label>
                                            <select class="form-control" name="currency" id="currency">
                                                <option selected disabled>Moneda:</option>
                                                @foreach ($currency as $cu)
                                                    <option value="{{ $cu->id }}"
                                                        {{ $enterprise->currency == $cu->id ? 'selected' : '' }}>
                                                        {{ $cu->symbol }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <small id="helpId" class="form-text text-muted">Cambio del dolar:
                                            36.68</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="tax_name" class="form-label">Nombre del impuesto</label>
                                            <input type="text" class="form-control" name="tax_name"
                                                value="{{ $enterprise->tax_name }}" id="tax_name"
                                                aria-describedby="helpId" placeholder="Nombre del impuesto" required />
                                            @error('tax_name')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Nombre del
                                                impuesto</small>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="mb-3">
                                            <label for="tax_ammount" class="form-label">Cantidad %</label>
                                            <input type="number" class="form-control" name="tax_ammount"
                                                value="{{ $enterprise->tax_ammount }}" id="tax_ammount"
                                                aria-describedby="helpId" placeholder="Cantidad de Impuesto" />
                                            @error('tax_ammount')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Cantidad de
                                                Impuesto</small>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Telefono</label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                value="{{ $enterprise->phone }}" aria-describedby="helpId"
                                                placeholder="Telefono de la empresa" required />
                                            @error('phone')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Telefono de la
                                                empresa</small>
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Correo</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ $enterprise->email }}" aria-describedby="helpId"
                                                placeholder="Tipo de la empresa" required />
                                            @error('email')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Caracteres especiales:
                                                8</small>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input id="pac-input" class="form-control" name="address" type="text"
                                                value="{{ $enterprise->address }}" placeholder="Buscar..." required>
                                            @error('address')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <br>

                                            <small id="helpId" class="form-text text-muted">Dirección de
                                                domicilio</small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="post_code" class="form-label">Código postal</label>
                                            <select class="form-control" name="post_code" id="post_code" required>
                                                <option selected disabled>Código postal:</option>
                                                @foreach ($country as $country)
                                                    <option value="{{ $country->phone_code }}"
                                                        {{ $enterprise->post_code == $country->phone_code ? 'selected' : '' }}>
                                                        {{ $country->phone_code }}</option>
                                                @endforeach
                                            </select>
                                            @error('post_code')
                                                <small id="helpId" class="form-text text-muted" style="color:red">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            <small id="helpId" class="form-text text-muted">Código postal</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit"
                                            class="btn btn-lg btn-success btn-block">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Card Footer --}}
                @hasSection('auth_footer')
                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                        @yield('auth_footer')
                    </div>
                @endif

            </div>
        </div>
    </div>
@stop


@section('css')

@stop

@section('js')
    <script>
        $('#select_country').on('change', function() {
            var id_country = $('#select_country').val();
            //alert(country);
            if (id_country) {
                $.ajax({
                    url: "{{ url('/admin/config/country/') }}" + '/' + id_country,
                    type: "GET",
                    success: function(data) {
                        $('#response_country').html(data);
                    }
                });
            } else {
                alert('debe seleccionar un pais');
            }
        });
    </script>
    {{-- script para las ciudades --}}
    <script>
        $(document).on('change', '#select_state', function() {
            var id_state = $(this).val();
            if (id_state) {
                $.ajax({
                    url: "{{ url('/admin/config/state/') }}" + '/' + id_state,
                    type: "GET",
                    success: function(data) {
                        $('#response_state').html(data);
                    }
                });
            } else {
                alert('debe seleccionar un estado');
            }
        });
    </script>
@stop
