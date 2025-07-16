<!DOCTYPE html>
<html lang="es" class="h-full">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Confirmación de registro</title>
  <link rel="icon" href="{{ asset('FiscaliaLogo.jpeg') }}" type="image/x-icon" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs" defer></script>
</head>
<body class="h-full bg-gradient-to-br from-indigo-50 to-white flex items-center justify-center">

  <div x-data="{ open: false }"
       class="bg-white shadow-2xl rounded-2xl p-10 w-full max-w-xl text-center transition-all duration-500 ease-in-out"
       :class="{ 'max-w-5xl': open }">

    <!-- Icono de éxito -->
    <div class="flex justify-center mb-6">
      <svg class="w-20 h-20 text-green-500" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M9 12l2 2 4-4M12 22a10 10 0 100-20 10 10 0 000 20z" />
      </svg>
    </div>

    <h2 class="text-3xl font-extrabold mb-4 text-green-700">¡Registro completado con éxito!</h2>
    <p class="mb-8 text-lg text-gray-700">
      Gracias por registrarte, <strong>{{ $user->nombre }}</strong>.
    </p>

    <button @click="open = !open"
      class="inline-flex items-center gap-2 px-6 py-3 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-700 transition shadow">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
           viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 4v16m8-8H4" />
      </svg>
      <span x-text="open ? 'Ocultar información' : 'Ver Comprobante PDF'"></span>
    </button>

    <!-- Contenedor del PDF -->
    <div x-show="open" x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         class="mt-8 w-full">
      <iframe src="{{ asset('storage/' . $user->comp) }}" type="application/pdf"
              class="w-full h-[500px] rounded-lg border"
              frameborder="0"></iframe>
    </div>

  </div>

</body>
</html>
