@extends('main')

@section('title', 'Editar Unidad de Medida')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Editar Unidad de Medida</h1>
    <a href="{{ route('unidad-medidas.index') }}" class="btn btn-secondary">Volver</a>
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

<form action="{{ route('unidad-medidas.update', $unidadMedida->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="codigo" class="form-label">Código</label>
        <input type="text" name="codigo" class="form-control" id="codigo" value="{{ $unidadMedida->codigo }}" required maxlength="5">
    </div>

    <div class="mb-3">
        <label for="unidad_medida" class="form-label">Unidad de Medida</label>
        <input type="text" name="unidad_medida" class="form-control" id="unidad_medida" value="{{ $unidadMedida->unidad_medida }}" required maxlength="50">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
