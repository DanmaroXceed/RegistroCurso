<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Confirmación de registro</title>
    <!-- CDN Tailwind CSS -->
    <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-gray-100 flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-xl text-center">
        <h2 class="text-3xl font-extrabold mb-6 text-green-700">¡Registro completado con éxito!</h2>
        <p class="mb-8 text-lg">Gracias por registrarte, <strong>{{ $user->nombre }}</strong>.</p>

        <a href="{{ asset('storage/' . $user->comp) }}" target="_blank"
           class="inline-block px-6 py-3 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 transition">
            Ver Comprobante PDF
        </a>
    </div>

</body>
</html>
