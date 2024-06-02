@extends('main')

@section('title', 'Editar Producto / Servicio')

@section('content')
<h1>Editar Producto / Servicio</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos-servicios.update', $productoServicio->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="tipo" class="form-label">Tipo</label>
        <select class="form-control" id="tipo" name="tipo">
            <option value="P" {{ $productoServicio->tipo == 'P' ? 'selected' : '' }}>Producto</option>
            <option value="S" {{ $productoServicio->tipo == 'S' ? 'selected' : '' }}>Servicio</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" class="form-control" id="codigo" name="codigo" value="{{ $productoServicio->codigo }}" required>
    </div>
    <div class="mb-3">
        <label for="producto_servicio" class="form-label">Producto / Servicio</label>
        <input type="text" class="form-control" id="producto_servicio" name="producto_servicio" value="{{ $productoServicio->producto_servicio }}" required>
    </div>
    <div class="mb-3">
        <label for="id_rubro" class="form-label">Rubro</label>
        <select class="form-control" id="id_rubro" name="id_rubro">
            @foreach ($rubros as $rubro)
                <option value="{{ $rubro->id }}" {{ $productoServicio->rubro->id == $rubro->id ? 'selected' : '' }}>{{ $rubro->rubro }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_unidad_medida" class="form-label">Unidad de Medida</label>
        <select class="form-control" id="id_unidad_medida" name="id_unidad_medida">
            @foreach ($unidadesMedida as $unidadMedida)
                <option value="{{ $unidadMedida->id }}" {{ $productoServicio->unidadMedida->id == $unidadMedida->id ? 'selected' : '' }}>{{ $unidadMedida->unidad_medida }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="id_condicion_iva" class="form-label">Condición de IVA</label>
        <select class="form-control" id="id_condicion_iva" name="id_condicion_iva">
            @foreach ($condicionesIva as $condicionIva)
                <option value="{{ $condicionIva->id }}" {{ $productoServicio->condicionIva->id == $condicionIva->id ? 'selected' : '' }}>{{ $condicionIva->condicion_iva }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="precio_bruto_unitario" class="form-label">Precio Bruto Unitario</label>
        <input type="number" step="0.01" class="form-control" id="precio_bruto_unitario" name="precio_bruto_unitario" value="{{ $productoServicio->precio_bruto_unitario }}" required maxlength="30">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
