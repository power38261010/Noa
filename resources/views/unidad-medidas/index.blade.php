@extends('welcome')

@section('title', 'Unidades de Medida')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <h1 class="me-3">Unidades de Medida</h1>
        <a href="{{ route('unidad-medidas.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus me-1"></i>
            <i class="bi bi-file-earmark"></i> 
        </a>
    </div>
</div>

<form method="GET" action="{{ route('unidad-medidas.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar por unidad de medida o código" value="{{ request()->get('search') }}">
        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
    </div>
</form>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered bg-white">
    <thead>
        <tr>
            <th>Código</th>
            <th>Unidad de Medida</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unidadesMedida as $unidadMedida)
            <tr>
                <td>{{ $unidadMedida->codigo }}</td>
                <td>{{ $unidadMedida->unidad_medida }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('unidad-medidas.edit', $unidadMedida->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('unidad-medidas.destroy', $unidadMedida->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $unidadesMedida->links() }}
</div>

@endsection

