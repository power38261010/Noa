@extends('main')

@section('title', 'Condiciones de IVA')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <h1 class="me-3">Condiciones de IVA</h1>

        <a href="{{ route('condicion-ivas.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus me-1"></i>
            <i class="bi bi-file-earmark"></i> 
        </a>
    </div>
</div>

<form method="GET" action="{{ route('condicion-ivas.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar por condición de IVA o código" value="{{ request()->get('search') }}">
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
            <th>ID</th>
            <th>Código</th>
            <th>Condición de IVA</th>
            <th>Alicuota</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($condicionesIva as $condicionIva)
            <tr>
                <td>{{ $condicionIva->id }}</td>
                <td>{{ $condicionIva->codigo }}</td>
                <td>{{ $condicionIva->condicion_iva }}</td>
                <td>{{ $condicionIva->alicuota }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('condicion-ivas.edit', $condicionIva->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('condicion-ivas.destroy', $condicionIva->id) }}" method="POST" style="display:inline-block;">
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
    {{ $condicionesIva->links() }}
</div>

@endsection
