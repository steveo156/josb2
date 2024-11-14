<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- forelse es combinacion de if con foreach --}}
        @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 md:flex md:justify-between md:items-center">
            <div class="spacing-y-3">
                <a href="http://" class="text-xl font-bold">
                    {{$vacante->titulo}}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                <p>Último día: {{$vacante->ultimo_dia->format('d.m.Y')}}</p>
            </div>

            <div class="flex flex-col md:flex-row gap-3 items-stretch mt-5 md:mt-0">
                <a href="http://"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Candidatos
                </a>

                <a href="{{route('vacantes.edit', $vacante->id)}}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                </a>

                <a href="http://"
                    class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Eliminar
                </a>
            </div>
        </div>

        @empty
        <p class="p-3 text-center  text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse


    </div>
    <div class="my-10">
        {{$vacantes->links()}}
    </div>

</div>