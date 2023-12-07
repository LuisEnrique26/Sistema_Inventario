<option selected disabled>Elige...</option>
    @foreach ($productos as $producto)
        <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
    @endforeach