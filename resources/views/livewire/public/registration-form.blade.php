<div>

    <div class="max-w-4xl mx-auto border border-gray-300 p-6 shadow-lg bg-white py-10">
        <!-- Encabezado -->
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="mb-4 md:mb-0">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="Logo" class="w-32 md:w-44 h-16 object-contain">
            </div>
            <div class="flex flex-col items-center text-center">
                <h1 class="text-lg md:text-xl font-bold">Universidad Autónoma "Gabriel Rene Moreno"</h1>
                <h2 class="text-md md:text-lg">Facultad de Ciencias Exactas y Tecnología</h2>
                <h2 class="text-md md:text-lg">Escuela de Ingeniería</h2>
            </div>
            <div class="invisible">
                <img src="{{ asset('imgs/logo.jpg') }}" alt="Logo Invisible" class="w-32 md:w-44 h-16 object-contain">
            </div>
        </div>
        @if ($program != null && $program->inscripcion_habilitado)
            <div class="bg-red-600 text-white text-center py-2 mt-6 rounded-md">
                <h3 class="font-bold text-sm md:text-base px-2">
                    Formulario de Inscripción
                </h3>
            </div>
            <!-- Programa -->
            <!-- Botón Guardar -->
            @if (!$readonly)
                <div class="flex justify-end mt-6">
                    <button wire:click="save"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                        Guardar
                    </button>
                </div>
            @endif
            @if (session()->has('success'))
                <br />
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                    <span class="font-medium">Guardado correctamente!</span> {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <br />
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">Error al guardar!</span> {{ session('error') }}
                </div>
            @endif
            <!-- Datos Programa -->
            <div class="bg-blue-900 text-white text-center py-2 mt-6 rounded-md">
                <h3 class="font-bold text-base">Datos Del Programa</h3>
            </div>
            <div class="grid grid-cols-1 gap-4 mt-4 text-sm">
                <!-- Nombre -->
                <div>
                    <label class="font-semibold">Programa</label>
                    <input type="text" readonly
                        value="{{ $program->nombre . ' - ' . $program->version . '.' . $program->edicion }}"
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                </div>
            </div>

            <!-- Datos Personales -->
            <div class="bg-blue-900 text-white text-center py-2 mt-6 rounded-md">
                <h3 class="font-bold text-base">Datos Personales del Postgraduante</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4 text-sm">
                <!-- Nombre -->
                <div class="md:col-span-2">
                    <label class="font-semibold">Nombre y Apellidos*</label>
                    <input type="text" wire:model.defer="form.nombre_completo" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.nombre_completo')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Género -->
                <div class="">
                    <label class="font-semibold">Género*</label>
                    <div class="flex flex-wrap gap-4 mt-1">
                        <label class="flex items-center">
                            <input type="radio" wire:model="form.genero" value="Masculino" class="mr-2"
                                @readonly($readonly)>
                            Masculino
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="form.genero" value="Femenino" class="mr-2"
                                @readonly($readonly)>
                            Femenino
                        </label>
                    </div>
                    @error('form.genero')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Nacionalidad -->
                <div class="">
                    <label class="font-semibold">Boliviano (a)*</label>
                    <div class="flex flex-wrap gap-4 mt-1">
                        <label class="flex items-center">
                            <input type="radio" wire:model="form.es_boliviano" value="1" class="mr-2"
                                @readonly($readonly)>
                            Sí
                        </label>
                        <label class="flex items-center">
                            <input type="radio" wire:model="form.es_boliviano" value="0" class="mr-2"
                                @readonly($readonly)>
                            Extranjero (a)
                        </label>
                    </div>
                    @error('form.es_boliviano')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- CI y Exp -->
                <div>
                    <label class="font-semibold">Carnet de identidad</label>
                    <input type="text" wire:model.defer="form.ci" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.ci')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="font-semibold">Exp.</label>
                    <input type="text" wire:model.defer="form.ci_expedido" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.ci_expedido')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pasaporte -->
                <div>
                    <label class="font-semibold">Pasaporte</label>
                    <input type="text" wire:model.defer="form.pasaporte" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                </div>

                <!-- Telefono -->
                <div>
                    <label class="font-semibold">Telefono</label>
                    <input type="text" wire:model.defer="form.telefono" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.telefono')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- WhatsApp -->
                <div>
                    <label class="font-semibold">WhatsApp*</label>
                    <input type="text" wire:model.defer="form.whatsapp" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.whatsapp')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="md:col-span-2">
                    <label class="font-semibold">E-mail*</label>
                    <input type="email" wire:model.defer="form.email" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Profesión -->
                <div>
                    <label class="font-semibold">Profesión*</label>
                    <input type="text" wire:model.defer="form.profesion" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.profesion')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Universidad -->
                <div>
                    <label class="font-semibold">Universidad de origen*</label>
                    <input type="text" wire:model.defer="form.universidad_origen" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.universidad_origen')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Año de Egreso -->
                <div>
                    <label class="font-semibold">Año de egreso*</label>
                    <input type="number" wire:model.defer="form.anio_egreso" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                    @error('form.anio_egreso')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Registro UAGRM -->
                <div>
                    <label class="font-semibold">N° de Registro en la UAGRM</label>
                    <input type="number" wire:model.defer="form.registro_uagrm" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                </div>

                <!-- Institución donde trabaja -->
                <div class="md:col-span-2">
                    <label class="font-semibold">Institución en la que trabaja</label>
                    <input type="text" wire:model.defer="form.institucion_trabajo" @readonly($readonly)
                        class="w-full border border-gray-400 p-2 mt-1 rounded">
                </div>

                <!-- Subir Foto -->
                <div class="md:col-span-2">
                    <label class="font-semibold">Subir una foto*</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="photo-upload"
                            class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" fill="none"
                                    viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click para
                                        subir</span>
                                    o
                                    arrastra el archivo</p>
                                <p class="text-xs text-gray-500">PNG, JPEG (MAX. 5MB)</p>
                            </div>
                            <input id="photo-upload" type="file" wire:model="foto" class="hidden"
                                accept="image/png, image/jpeg" @readonly($readonly) />
                        </label>
                    </div>
                    @if ($foto)
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Vista previa: (<small>Si deseas cambiar la foto,
                                    simplemente
                                    sube
                                    una nueva.</small>)</p>
                            <img src="{{ $foto->temporaryUrl() }}" alt="Vista previa de la foto"
                                class="mt-2 w-64 h-32 object-cover rounded">
                        </div>
                    @endif
                    @error('foto')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                    @error('form.url_foto')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Experiencia Laboral -->
            <div class="bg-blue-900 text-white text-center py-2 mt-6 rounded-md">
                <h3 class="font-bold text-base">Experiencia Laboral*</h3>
            </div>

            <p class="text-sm mt-2">
                Si viene de otras universidades, agradecemos por la confianza en la Escuela de Ingeniería. Estamos
                seguros
                que
                su inversión en este programa potenciará su perfil profesional y lo promoverá como un profesional
                más
                competitivo.
            </p>

            <textarea class="w-full mt-4 text-sm border border-gray-400 rounded p-3" rows="6" @readonly($readonly)
                wire:model.defer="form.experiencia_laboral" placeholder="Describa aquí su experiencia laboral..."></textarea>
            @error('form.experiencia_laboral')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        @else
            <div class="max-w-4xl mx-auto border border-gray-300 p-6 shadow-lg bg-white py-10">
                <div class="bg-red-600 text-white text-center py-2 mt-6 rounded-md">
                    <h3 class="font-bold text-sm md:text-base px-2">
                        Inscripción no habilitada
                    </h3>
                </div>
            </div>
        @endif
        <!-- Logos -->
        <div class="flex flex-wrap justify-center gap-6 mt-8">
            <img src="{{ asset('imgs/fcet.jpg') }}" alt="Logo fcet" class="h-16 object-contain">
            <img src="{{ asset('imgs/uagrm.png') }}" alt="Logo uagrm" class="h-16 object-contain">
            <img src="{{ asset('imgs/ei-logo.png') }}" alt="Logo ei" class="h-16 object-contain">
        </div>


    </div>

</div>
