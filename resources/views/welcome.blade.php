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
                <p>
                    Bienvenido a nuestra plataforma de facturación de productos y servicios. Aquí puedes gestionar todos tus productos y servicios de manera eficiente y sencilla. Nuestra plataforma te permite organizar y facturar tus productos y servicios, así como gestionar rubros, unidades de medida y condiciones de IVA.
                </p>
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://coelabogados.mx/wp-content/uploads/2023/08/facturando.jpg" class="d-block w-100" alt="Office Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="https://cards.algoreducation.com/_next/image?url=https%3A%2F%2Ffiles.algoreducation.com%2Fproduction-ts%2F__S3__69cd418f-a7fc-4779-be40-24fd86860808&w=3840&q=75" class="d-block w-100" alt="Office Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.jubierp.com/sites/default/files/styles/wide_crop/public/2024-01/oficina.png.webp?itok=iveO0ywJ" class="d-block w-100" alt="Office Image 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <p>
                    Nuestra plataforma está diseñada para ofrecer una experiencia de usuario intuitiva y eficiente. Con nuestras herramientas, puedes optimizar tus procesos de facturación y mantener un control preciso de tus inventarios. Explora nuestras secciones para empezar a utilizar todas las funcionalidades que ofrecemos.
                </p>
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
