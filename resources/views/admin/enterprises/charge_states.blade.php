<select class="form-control" name="state" id="select_state">
    <option selected disabled>Seleccione un estado</option>
    @foreach ($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
    @endforeach
</select>
