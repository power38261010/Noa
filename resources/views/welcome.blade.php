<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Productos y Servicios')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #e3f2fd;
        }
        .navbar-brand {
            font-weight: bold;
            color: #0275d8 !important;
        }
        .navbar-nav {
            margin: 0 auto;
            display: flex;
            justify-content: center;
        }
        .nav-link {
            color: #0275d8 !important;
            transition: color 0.3s ease;
            padding: 0.5rem 1rem;
        }
        .nav-link.active {
            color: #fff !important;
            background-color: #0275d8 !important;
            border-radius: 5px;
        }
        .nav-link:hover {
            color: #0056b3 !important;
        }
        .nav-item {
            margin-right: 1rem; /* Ajusta el espacio entre las solapas */
        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }
        .carousel img {
            max-width: 100%;
            height: auto;
        }
        .content p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('welcome') }}">NOA</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('productos-servicios.*')) active @endif" href="{{ route('productos-servicios.index') }}">Productos / Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('rubros.*')) active @endif" href="{{ route('rubros.index') }}">Rubros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('unidad-medidas.*')) active @endif" href="{{ route('unidad-medidas.index') }}">Unidades de Medida</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('condicion-ivas.*')) active @endif" href="{{ route('condicion-ivas.index') }}">Condiciones de IVA</a>
                    </li>
                </ul>
            </div>
            <!-- Botón de Cerrar Sesión -->
            <div class="ms-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @hasSection('content')
            @yield('content')
        @else
            <div class="content">
                <!-- Contenido por defecto -->
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
