 <select class="form-control" name="city" id="select_cities">
     <option selected disabled>Seleccione una ciudad: </option>
     @foreach ($cities as $city)
         <option value="{{ $city->id }}">{{ $city->name }}</option>
     @endforeach
 </select>
