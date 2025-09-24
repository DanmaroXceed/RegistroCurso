<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro concluido</title>
  <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full bg-gradient-to-br from-indigo-50 to-white flex items-center justify-center">

  <div x-data="{ open: false }"
       class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-xl text-center transition-all duration-500 ease-in-out"
       :class="{ 'max-w-5xl': open }">

    <!-- Icono -->
    <div class="flex justify-center mb-6">
      <svg class="w-20 h-20 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12l2 2 4-4M12 22a10 10 0 100-20 10 10 0 000 20z" />
      </svg>
    </div>

    <h2 class="text-3xl font-extrabold mb-4 text-green-700">¡Gracias a todos los participantes!</h2>
    
    <p class="mb-4 text-lg text-gray-700">
      El periodo de registro ha finalizado exitosamente.
    </p>

    <p class="mb-8 text-base text-gray-600">
      Si completaste tu registro, te recomendamos estar atento a tu correo electrónico o a los canales oficiales para futuras notificaciones.
    </p>

    <p class="mb-8 text-base text-gray-600">
      Por favor contesta el siguiente <a href="/formulario" style="color: blue">formulario de satisfacción</a> referente al curso.

    </p>

    <p class="mt-6 text-sm text-gray-500">
      Para más información, por favor contacta al área correspondiente o visita nuestro sitio oficial.
    </p>

  </div>

</body>
</html>
