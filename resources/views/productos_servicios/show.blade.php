@extends('welcome')

@section('title', 'Detalles del Producto / Servicio')

@section('content')
<h1>Detalles del Producto / Servicio</h1>

<div class="mb-3">
    <label class="form-label">Tipo</label>
    <p>{{ $productoServicio->tipo == 'P' ? 'Producto' : 'Servicio' }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Código</label>
    <p>{{ $productoServicio->codigo }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Producto / Servicio</label>
    <p>{{ $productoServicio->producto_servicio }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Rubro</label>
    <p>{{ $productoServicio->rubro->rubro }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Unidad de Medida</label>
    <p>{{ $productoServicio->unidadMedida->unidad_medida }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Fecha</label>
    <p>{{ $productoServicioDTO->created_at }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Condición de IVA</label>
    <p>{{ $productoServicio->condicionIva->condicion_iva }}</p>
</div>
<div class="mb-3">
    <label class="form-label">Precio Bruto Unitario</label>
    <p>{{ $productoServicio->precio_bruto_unitario }}</p>
</div>

<a href="{{ route('productos-servicios.index') }}" class="btn btn-secondary">Volver</a>
@endsection
