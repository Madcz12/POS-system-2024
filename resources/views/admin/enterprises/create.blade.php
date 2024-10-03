@extends('adminlte::master')

@php($dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home'))

@if (config('adminlte.use_route_url', false))
    @php($dashboard_url = $dashboard_url ? route($dashboard_url) : '')
@else
    @php($dashboard_url = $dashboard_url ? url($dashboard_url) : '')
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body'){{ ($auth_type ?? 'login') . '-page' }}@stop

@section('body')
    <div class="container">

        <center>
            <img src="{{ asset('/images/intro.jpg') }}" alt="" width="250px">
        </center>
        <br>

        <div class="row">
            <div class="col-md-12">
                <div class="card" style="box-shadow: 5px 5px 5px #cccccc">

                    {{-- Card Header --}}
                    <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                        <h3 class="card-title float-none text-center">
                            <b>Registro de una nueva empresa</b>
                        </h3>
                    </div>


                    {{-- Card Body --}}
                    <div
                        class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                        <form action="{{ url('/create-enterprise/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="logo">Logo</label>
                                        <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="logo"
                                            id="logo-file" required>
                                        @error('logo')
                                            <small id="helpId" class="form-text text-muted" style="color:red">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                        <br>
                                        <center id="list"></center>
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
                                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="department" class="form-label">Estado/Departamento</label>
                                                <div id="response_country">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="department" class="form-label">Ciudades</label>
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
                                                    value="{{ old('ent_type') }}" aria-describedby="helpId"
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
                                                    value="{{ old('name') }}" aria-describedby="helpId"
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
                                                    value="{{ old('nit') }}" aria-describedby="helpId" placeholder="nit"
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
                                                        <option value="{{ $cu->id }}">{{ $cu->symbol }}</option>
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
                                                    value="{{ old('tax_name') }}" id="tax_name"
                                                    aria-describedby="helpId" placeholder="Nombre del impuesto"
                                                    required />
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
                                                    value="{{ old('tax_ammount') }}" id="tax_ammount"
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
                                                    value="{{ old('phone') }}" aria-describedby="helpId"
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
                                                    value="{{ old('email') }}" aria-describedby="helpId"
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
                                                    value="{{ old('address') }}" placeholder="Buscar..." required>
                                                @error('address')
                                                    <small id="helpId" class="form-text text-muted" style="color:red">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <br>
                                                <div id="map" style="width: 100%;height: 400px"></div>
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
                                                        <option value="{{ $country->phone_code }}">
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
                                            <button type="submit" class="btn btn-lg btn-primary btn-block">Crear</button>
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
        {{-- Card Box --}}


    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script>
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initAutocomplete() {
            var map = new google.maps.Map(document.getElementById('map'), {
                // Coordenadas de Monterrey, N.L., México
                center: {
                    lat: 25.685088,
                    lng: -100.327482
                }, //{lat: -33.8688, lng: 151.2195},
                zoom: 13,
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input); // determina la posicion

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                /*
                 * Para fines de minimizar las adecuaciones debido a que es este una demostración de adaptación mínima de código, se reemplaza forEach por some.
                 */
                // places.forEach(function(place) {
                places.some(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                    // some interrumpe su ejecución en cuanto devuelve un valor verdadero (true)
                    return true;
                });
                map.fitBounds(bounds);
            });
        }
    </script>
    {{-- script para los estados --}}
    <script>
        $('#select_country').on('change', function() {
            var id_country = $('#select_country').val();
            //alert(country);
            if (id_country) {
                $.ajax({
                    url: "{{ url('/create-enterprise/country/') }}" + '/' + id_country,
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
                    url: "{{ url('/create-enterprise/state/') }}" + '/' + id_state,
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
