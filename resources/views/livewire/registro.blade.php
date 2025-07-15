<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-2xl">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">REGISTRO AL CURSO EN MATERIA DE VIOLENCIA DE GÉNERO
        </h2>

        <form wire:submit.prevent="register" class="space-y-4" enctype="multipart/form-data">
            <!-- Correo principal -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" wire:model.defer="email" id="email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="correo@email.com">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Apellido paterno -->
            <div>
                <label for="a_pat" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                <input type="text" wire:model.defer="a_pat" id="a_pat"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Apellido paterno">
                @error('a_pat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Apellido materno -->
            <div>
                <label for="a_mat" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                <input type="text" wire:model.defer="a_mat" id="a_mat"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Apellido materno">
                @error('a_mat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Nombre -->
            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre(s)</label>
                <input type="text" wire:model.defer="nombre" id="nombre"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Nombre(s)">
                @error('nombre')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Institución -->
            <div>
                <label for="inst" class="block text-sm font-medium text-gray-700">Institución</label>
                <input type="text" wire:model.defer="inst" id="inst"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Nombre de la institución">
                @error('inst')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Cargo -->
            <div>
                <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                <input type="text" wire:model.defer="cargo" id="cargo"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Cargo o puesto">
                @error('cargo')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Entidad Federativa -->
            <div>
                <label for="e_fed" class="block text-sm font-medium text-gray-700">Entidad Federativa</label>
                <input type="text" wire:model.defer="e_fed" id="e_fed"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Estado">
                @error('e_fed')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Clave de Elector -->
            <div>
                <label for="c_elec" class="block text-sm font-medium text-gray-700">Clave de Elector</label>
                <input style="text-transform: uppercase;" type="text" wire:model.defer="c_elec" id="c_elec"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Clave de elector">
                @error('c_elec')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Foto INE -->
            <div>
                <label for="ine" class="block text-sm font-medium text-gray-700">Foto de INE</label>
                <input type="file" wire:model="ine" id="ine"
                    class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('ine')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pasaporte (opcional) -->
            <div>
                <label for="pasap" class="block text-sm font-medium text-gray-700">Pasaporte (opcional)</label>
                <input type="text" wire:model.defer="pasap" id="pasap"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Número de pasaporte">
                @error('pasap')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- CURP (dato textual) -->
            <div>
                <label for="c_curp" class="block text-sm font-medium text-gray-700">CURP</label>
                <input style="text-transform: uppercase;" type="text" wire:model.defer="c_curp" id="c_curp"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="CURP">
                @error('c_curp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Foto CURP -->
            <div>
                <label for="curp" class="block text-sm font-medium text-gray-700">Foto de CURP</label>
                <input type="file" wire:model="curp" id="curp"
                    class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @error('curp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Correo Complementario -->
            <div>
                <label for="email_comp" class="block text-sm font-medium text-gray-700">Correo Complementario</label>
                <input type="email" wire:model.defer="email_comp" id="email_comp"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Correo alterno">
                @error('email_comp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Teléfono fijo -->
            <div>
                <label for="tel" class="block text-sm font-medium text-gray-700">Teléfono Fijo</label>
                <input type="text" wire:model.defer="tel" id="tel"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Teléfono fijo">
                @error('tel')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Extensión -->
            <div>
                <label for="ext" class="block text-sm font-medium text-gray-700">Extensión</label>
                <input type="text" wire:model.defer="ext" id="ext"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Extensión">
                @error('ext')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Celular -->
            <div>
                <label for="cel" class="block text-sm font-medium text-gray-700">Celular</label>
                <input type="text" wire:model.defer="cel" id="cel"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Celular">
                @error('cel')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón Registrar -->
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Registrarse
                </button>
            </div>
        </form>
    </div>

    <!-- Overlay centrado siempre -->
    <div wire:loading wire:target="register" class="fixed inset-0 bg-black bg-opacity-50 z-50">
        <div class="flex items-center justify-center min-h-screen">
            <div class="flex flex-col items-center">
                <svg class="animate-spin h-16 w-16 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <p class="text-white text-lg mt-4">Procesando registro...</p>
            </div>
        </div>
    </div>


</div>
