@extends('main')

@section('title', 'Productos y Servicios')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <div class="d-flex align-items-center">
        <h1 class="me-3">Productos y Servicios</h1>
        <a href="{{ route('productos-servicios.create') }}" class="btn btn-primary d-flex align-items-center">
            <i class="bi bi-plus me-1"></i>
            <i class="bi bi-file-earmark"></i> 
        </a>
    </div>
</div>

<form method="GET" action="{{ route('productos-servicios.index') }}" class="mb-4">
    <div class="row">
        <div class="col-md-3">
            <label for="tipo" class="form-label">Tipo</label>
            <select name="tipo" id="tipo" class="form-control">
                <option value="">Todos</option>
                <option value="P" {{ request('tipo') == 'P' ? 'selected' : '' }}>Producto</option>
                <option value="S" {{ request('tipo') == 'S' ? 'selected' : '' }}>Servicio</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="rubro" class="form-label">Rubro</label>
            <select name="rubro" id="rubro" class="form-control">
                <option value="">Todos</option>
                @foreach($rubros as $rubro)
                    <option value="{{ $rubro->id }}" {{ request('rubro') == $rubro->id ? 'selected' : '' }}>{{ $rubro->rubro }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="condicion_iva" class="form-label">Condición de IVA</label>
            <select name="condicion_iva" id="condicion_iva" class="form-control">
                <option value="">Todos</option>
                @foreach($condicionesIva as $condicionIva)
                    <option value="{{ $condicionIva->id }}" {{ request('condicion_iva') == $condicionIva->id ? 'selected' : '' }}>{{ $condicionIva->condicion_iva }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="unidad_medida" class="form-label">Unidad de Medida</label>
            <select name="unidad_medida" id="unidad_medida" class="form-control">
                <option value="">Todos</option>
                @foreach($unidadesMedida as $unidadMedida)
                    <option value="{{ $unidadMedida->id }}" {{ request('unidad_medida') == $unidadMedida->id ? 'selected' : '' }}>{{ $unidadMedida->unidad_medida }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">
            <label for="date_filter" class="form-label">Fecha de Creación</label>
            <select name="date_filter" id="date_filter" class="form-control">
                <option value="">Todos</option>
                <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Hoy</option>
                <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>Esta Semana</option>
                <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>Este Mes</option>
                <option value="year" {{ request('date_filter') == 'year' ? 'selected' : '' }}>Este Año</option>
            </select>
        </div>
        <div class="col-md-9">
            <label for="search" class="form-label">Buscar</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por código o nombre" value="{{ request()->get('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </div>
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
            <th>Tipo</th>
            <th>Código</th>
            <th>Producto / Servicio</th>
            <th>Precio Bruto Unitario</th>
            <th width="280px">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productosServicios as $productoServicioDTO)
        <tr>
            <td>{{ $productoServicioDTO->id }}</td>
            <td>{{ $productoServicioDTO->tipo }}</td>
            <td>{{ $productoServicioDTO->codigo }}</td>
            <td>$ {{ $productoServicioDTO->producto_servicio }}</td>
            <td>{{ $productoServicioDTO->precio_bruto_unitario }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('productos-servicios.show', $productoServicioDTO->id) }}">
                    <i class="bi bi-eye"></i>
                </a>
                <a class="btn btn-primary" href="{{ route('productos-servicios.edit', $productoServicioDTO->id) }}">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('productos-servicios.destroy', $productoServicioDTO->id) }}" method="POST" style="display:inline-block;">
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

<!-- Fila de resumen -->
<div class="row bg-light text-dark p-3 mb-4">
    <div class="col">
        <strong>Precio Total: $</strong> {{ $sumBruto }}
    </div>
    <div class="col">
        <strong>Precio Total con IVA: $</strong> {{ $sumBrutoConIva }}
    </div>
</div>

<div class="d-flex justify-content-center">
    @isset($productosServicios)
    {{ $productosServicios->links() }}
    @endisset
</div>

@endsection
