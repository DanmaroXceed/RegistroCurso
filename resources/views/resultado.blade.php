<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Resultado del formulario</title>
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

    <style>
        .logo-card {
            position: fixed;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.295);
            max-height: 100px;
            height: auto;
        }
    </style>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <img class="logo-card" src="{{ asset('logoazul.png') }}" alt="Logo Fiscalía">

    <div class="card shadow p-4 text-center" style="max-width: 500px; border-radius: 1rem;">
        @if ($success)
            <div class="alert alert-success" style="margin-bottom: 0px;">
                <h4>{{ $mensaje }}</h4>
            </div>
        @else
            <div class="alert alert-danger" style="margin-bottom: 0px;">
                <h4>{{ $mensaje }}</h4>
            </div>
        @endif
    </div>

</body>

</html>
