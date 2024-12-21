<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- forelse es combinacion de if con foreach --}}
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
                <div class="spacing-y-3">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                    <p>Último día: {{ $vacante->ultimo_dia->format('d.m.Y') }}</p>
                </div>

                <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                    <a href="http://"
                        class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Candidatos
                    </a>

                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                        class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>

                    <button wire:click="$dispatch('mostrarAlerta', { vacante_id: {{ $vacante->id }} })"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>

        @empty
            <p class="p-3 text-center  text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse


    </div>
    <div class="my-10">
        {{ $vacantes->links() }}
    </div>

</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', ({
            vacante_id
        }) => {
            Swal.fire({
                title: '¿Eliminar Vacante?',
                text: "Una vacante eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, ¡Eliminar!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar la vacante desde el servidor
                    Livewire.dispatch('eliminarVacante', {
                        vacante: vacante_id
                    });

                    Swal.fire(
                        '¡Eliminada!',
                        'La vacante ha sido eliminada',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
