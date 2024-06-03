@extends('welcome')

@section('title', 'Editar Rubro')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h1>Editar Rubro</h1>
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

<form action="{{ route('rubros.update', $rubro->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="rubro" class="form-label">Rubro</label>
        <input type="text" name="rubro" class="form-control" id="rubro" value="{{ $rubro->rubro }}" required maxlength="50">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection
