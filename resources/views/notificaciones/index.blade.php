<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-semibold text-center mb-10">Mis notificaciones</h1>

                    <div class="divide-y divide-gray-200">

                        @forelse ($notificaciones as $notificacion)
                            <div class="mb-4 p-5 md:flex md:justify-between md:items-center">

                                <div>

                                    <p> Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>

                                    <p>
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <div class="mt-5 md:mt-0">
                                    <a class="bg-yellow-500 p-4 rounded-lg text-white" href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}">Ver candidatos</a>
                                </div>
                            </div>
                        @empty
                            <p>No tienes notificaciones</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
