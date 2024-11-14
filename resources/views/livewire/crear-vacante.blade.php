<form class="md:w-1/2 space-y-5" action="" wire:submit.prevent='crearVacante'>
    <div>
        <x-input-label for="titulo" :value="__('Título vacante')" />

        {{-- En livewire en lugar de name usamos wire:model para hacer la validacion en el controlador de livewire --}}
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')"
            placeholder="Título vacante" />

        @error('titulo')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />

        <select wire:model="salario" id="salario"
            class="block text-sm text-gray-500 font-bold uppercase mb-2 w-full border-gray-300 focus:ring-opacity-50 focus:ring-indigo-200 focus:border-indigo-300 focus:ring shadow-sm rounded-md">

            <option value="">-- Seleccione el rango salarial --</option>
            @foreach ($salarios as $salario)
            <option value="{{ $salario->id}}"> {{$salario->salario}}</option>
            @endforeach
        </select>

        @error('salario')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />

        <select wire:model="categoria" id="categoria"
            class="block text-sm text-gray-500 font-bold uppercase mb-2 w-full border-gray-300 focus:ring-opacity-50 focus:ring-indigo-200 focus:border-indigo-300 focus:ring shadow-sm rounded-md">

            <option value="">-- Seleccione una categoria --</option>

            @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id}}"> {{$categoria->categoria}}</option>
            @endforeach

        </select>

        @error('categoria')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />

        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')"
            placeholder="Empresa: ej. Netflix, Google, Udemy" />

        @error('titulo')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Último día para postularse')" />

        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia"
            :value="old('ultimo_dia')" />

        @error('ultimo_dia')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la vacante')" />

        <textarea wire:model="descripcion" placeholder="Descripción general del puesto"
            class="block text-sm text-gray-500 font-bold uppercase mb-2 w-full border-gray-300 focus:ring-opacity-50 focus:ring-indigo-200 focus:border-indigo-300 focus:ring shadow-sm rounded-md h-72"></textarea>

        @error('descripcion')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>


    <div>
        <div class="my-5 w-56 ">
            @if($imagen)
            <img src="{{$imagen->temporaryUrl()}}" alt="">
            @endif
        </div>
        <x-input-label for="imagen" :value="__('Imagen')" />

        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen" accept="image/*" />

        {{-- Gracias a wire:model tenemos el "Two way data binding" o enlace de datos bidireccional donde se envian
        datos al servidor y se obtiene una respuesta en el front --}}


        @error('imagen')
        <livewire:mostrarAlerta :message="$message" />
        @enderror
    </div>

    <x-primary-button>
        Crear vacante
    </x-primary-button>

</form>