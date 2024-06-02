@extends('main')

@section('title', 'Editar Condición de IVA')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Editar Condición de IVA</h1>
    <a href="{{ route('condicion-ivas.index') }}" class="btn btn-secondary">Volver</a>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('condicion-ivas.update', $condicionIva->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="number" min="0" max="32767" name="codigo" class="form-control" id="codigo" value="{{ $condicionIva->codigo }}" required>
    </div>

    <div class="mb-3">
        <label for="condicion_iva" class="form-label">Condición de IVA</label>
        <input type="text" name="condicion_iva" class="form-control" id="condicion_iva" value="{{ $condicionIva->condicion_iva }}" required maxlength="50">
    </div>

    <div class="mb-3">
        <label for="alicuota" class="form-label">Alicuota</label>
        <input type="number" step="0.01" min="0" max="9999999.99" name="alicuota" class="form-control" id="alicuota" value="{{ $condicionIva->alicuota }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
