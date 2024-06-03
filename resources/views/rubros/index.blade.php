@extends('main')

@section('title', 'Rubros')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <h1 class="me-3">Rubros</h1>
        <a href="{{ route('rubros.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus me-1"></i>
            <i class="bi bi-file-earmark"></i> 
        </a>
    </div>
</div>

<form method="GET" action="{{ route('rubros.index') }}" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Buscar por rubro" value="{{ request()->get('search') }}">
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
            <th>Rubro</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rubros as $rubro)
            <tr>
                <td>{{ $rubro->rubro }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('rubros.edit', $rubro->id) }}">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <form action="{{ route('rubros.destroy', $rubro->id) }}" method="POST" style="display:inline-block;">
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
    {{ $rubros->links() }}
</div>

@endsection
