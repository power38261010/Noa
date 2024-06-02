@extends('main')

@section('title', 'Nuevo Rubro')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Nuevo Rubro</h1>
    <a href="{{ route('rubros.index') }}" class="btn btn-secondary">Volver</a>
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

<form action="{{ route('rubros.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="rubro" class="form-label">Rubro</label>
        <input type="text" name="rubro" class="form-control" id="rubro" value="{{ old('rubro') }}" required maxlength="50">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection
