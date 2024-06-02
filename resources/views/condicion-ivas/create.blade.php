@extends('main')

@section('title', 'Nueva Condición de IVA')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Nueva Condición de IVA</h1>
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

<form action="{{ route('condicion-ivas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="number" min="0" max="32767" name="codigo" class="form-control" id="codigo" value="{{ old('codigo') }}" required>
    </div>

    <div class="mb-3">
        <label for="condicion_iva" class="form-label">Condición de IVA</label>
        <input type="text" name="condicion_iva" class="form-control" id="condicion_iva" value="{{ old('condicion_iva') }}" required maxlength="50">
    </div>

    <div class="mb-3">
        <label for="alicuota" class="form-label">Alicuota</label>
        <input type="number" step="0.001" min="0" max="9999999.999" name="alicuota" class="form-control" id="alicuota" value="{{ old('alicuota') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
