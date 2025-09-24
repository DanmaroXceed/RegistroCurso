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
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4 text-center" style="max-width: 500px; border-radius: 1rem;">
        @if ($success)
            <div class="alert alert-success">
                <h4>{{ $mensaje }}</h4>
            </div>
        @else
            <div class="alert alert-danger">
                <h4>{{ $mensaje }}</h4>
            </div>
        @endif
    </div>

</body>

</html>
