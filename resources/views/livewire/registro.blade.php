<div
    class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-50 to-white py-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-2xl shadow-2xl p-10 w-full max-w-4xl">
        <h2 class="text-3xl font-extrabold text-center text-indigo-700 mb-10">
            Registro al Curso en Materia de Violencia de Género
        </h2>

        <form wire:submit.prevent="register" class="space-y-2 md:grid md:grid-cols-2 md:gap-6" > <!--method="POST"-->

            <!-- Datos Personales -->
            <div class="col-span-2">
                <h3 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
                    <svg class="w-5 h-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5.121 17.804A1.993 1.993 0 016 17h12a1.993 1.993 0 01.879.196M4 4a4 4 0 018 0 4 4 0 11-8 0zM12 14a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                    Datos Personales
                </h3>
            </div>

            <div>
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre(s)</label>
                <input type="text" wire:model.defer="nombre" id="nombre"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Nombre(s)">
                @error('nombre')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="a_pat" class="block text-sm font-medium text-gray-700">Apellido Paterno</label>
                <input type="text" wire:model.defer="a_pat" id="a_pat"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Apellido paterno">
                @error('a_pat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="a_mat" class="block text-sm font-medium text-gray-700">Apellido Materno</label>
                <input type="text" wire:model.defer="a_mat" id="a_mat"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Apellido materno">
                @error('a_mat')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" wire:model.defer="email" id="email"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="correo@email.com">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Datos Profesionales -->
            <div class="col-span-2">
                <h3 class="text-xl font-semibold text-gray-700 mt-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 0a2 2 0 002-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v8a2 2 0 002 2h10z" />
                    </svg>
                    Datos Profesionales
                </h3>
            </div>

            <div>
                <label for="inst" class="block text-sm font-medium text-gray-700">Institución</label>
                <input type="text" wire:model.defer="inst" id="inst"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Nombre de la institución">
                @error('inst')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="cargo" class="block text-sm font-medium text-gray-700">Cargo</label>
                <input type="text" wire:model.defer="cargo" id="cargo"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Cargo o puesto">
                @error('cargo')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="e_fed" class="block text-sm font-medium text-gray-700 mb-1">Entidad Federativa</label>
                <select wire:model.defer="e_fed" id="e_fed"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
                    <option value="" selected>Selecciona un estado</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Ciudad de México">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
                @error('e_fed')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <!-- Datos Documentales -->
            <div class="col-span-2">
                <h3 class="text-xl font-semibold text-gray-700 mt-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Documentos e Identificación
                </h3>
            </div>

            <div>
                <label for="c_elec" class="block text-sm font-medium text-gray-700">Clave de Elector</label>
                <input type="text" wire:model.defer="c_elec" id="c_elec"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Clave de elector">
                @error('c_elec')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div x-data="{ fileName_ine: '' }">
                <label for="ine" class="block text-sm font-medium text-gray-700 mb-1">
                    Foto de pasaporte
                </label>

                <label for="ine"
                    class="flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg shadow cursor-pointer hover:bg-indigo-700 transition">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M12 3v9" />
                    </svg>
                    <span>Seleccionar archivo</span>
                </label>

                <input id="ine" name="ine" wire:model="ine" type="file" class="hidden"
                    @change="fileName_ine = $event.target.files[0] ? $event.target.files[0].name : ''">

                <div x-show="fileName_ine" class="mt-2 text-sm text-gray-600">
                    Archivo: <span x-text="fileName_ine"></span>
                </div>

                @error('ine')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="c_curp" class="block text-sm font-medium text-gray-700">CURP</label>
                <input type="text" wire:model.defer="c_curp" id="c_curp"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="CURP">
                @error('c_curp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div x-data="{ fileName_curp: '' }">
                <label for="curp" class="block text-sm font-medium text-gray-700 mb-1">
                    Foto de pasaporte
                </label>

                <label for="curp"
                    class="flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg shadow cursor-pointer hover:bg-indigo-700 transition">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M12 3v9" />
                    </svg>
                    <span>Seleccionar archivo</span>
                </label>

                <input id="curp" name="curp" wire:model="curp" type="file" class="hidden"
                    @change="fileName_curp = $event.target.files[0] ? $event.target.files[0].name : ''">

                <div x-show="fileName_curp" class="mt-2 text-sm text-gray-600">
                    Archivo: <span x-text="fileName_curp"></span>
                </div>

                @error('curp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="pasap" class="block text-sm font-medium text-gray-700">Pasaporte (opcional)</label>
                <input type="text" wire:model.defer="pasap" id="pasap"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Número de pasaporte">
                @error('pasap')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div x-data="{ fileName_pasap: '' }">
                <label for="f_pasap" class="block text-sm font-medium text-gray-700 mb-1">
                    Foto de pasaporte
                </label>

                <label for="f_pasap"
                    class="flex items-center justify-center px-4 py-3 bg-indigo-600 text-white rounded-lg shadow cursor-pointer hover:bg-indigo-700 transition">
                    <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1M12 12v9m0-9l-3 3m3-3l3 3M12 3v9" />
                    </svg>
                    <span>Seleccionar archivo</span>
                </label>

                <input id="f_pasap" name="f_pasap" wire:model="f_pasap" type="file" class="hidden"
                    @change="fileName_pasap = $event.target.files[0] ? $event.target.files[0].name : ''">

                <div x-show="fileName_pasap" class="mt-2 text-sm text-gray-600">
                    Archivo: <span x-text="fileName_pasap"></span>
                </div>
            </div>

            <!-- Datos de Contacto -->
            <div class="col-span-2">
                <h3 class="text-xl font-semibold text-gray-700 mt-4 flex items-center gap-2">
                    <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-9 4v4m0 4h.01M12 12h.01" />
                    </svg>
                    Datos de Contacto
                </h3>
            </div>

            <div>
                <label for="email_comp" class="block text-sm font-medium text-gray-700">Correo Complementario</label>
                <input type="email" wire:model.defer="email_comp" id="email_comp"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Correo alterno">
                @error('email_comp')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="cel" class="block text-sm font-medium text-gray-700">Celular</label>
                <input type="text" wire:model.defer="cel" id="cel"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Celular">
                @error('cel')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="tel" class="block text-sm font-medium text-gray-700">Teléfono Fijo</label>
                <input type="text" wire:model.defer="tel" id="tel"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Teléfono fijo">
                @error('tel')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="ext" class="block text-sm font-medium text-gray-700">Extensión</label>
                <input type="text" wire:model.defer="ext" id="ext"
                    class="py-2 px-4 text-lg mt-1 block w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Extensión">
                @error('ext')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Botón -->
            <div class="col-span-2">
                <button type="submit"
                    class="w-full py-3 px-6 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 transition">
                    Registrarse
                </button>
            </div>
        </form>

        <!-- Overlay de carga centrado -->
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
</div>
