<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Componente de filtrado -->
    <livewire:vacantes.components.filtrar-vacantes/>

    <!-- Título principal -->
    <div class="text-center mb-12">
        <h2 class="text-4xl font-extrabold text-gray-900 mb-2">Nuestras Vacantes Disponibles</h2>
        <p class="text-lg text-gray-600">Encuentra la oportunidad perfecta para tu carrera profesional</p>
    </div>

    <!-- Grid de 3 columnas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($vacantes as $vacante)
            <div
                class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-gray-200 flex flex-col h-full">
                <!-- Imagen de la vacante (opcional) -->
                <div class="h-40 bg-gray-100 overflow-hidden">
                    <img class="w-full h-full object-cover"
                         src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                         alt="{{ $vacante->titulo }}">
                </div>

                <!-- Contenido -->
                <div class="p-6 flex-grow">
                    <div class="flex justify-between items-start mb-2">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                            {{ $vacante->categoria->categoria }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $vacante->created_at->diffForHumans() }}</span>
                    </div>

                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="block">
                        <h3 class="text-xl font-bold text-gray-900 hover:text-yellow-600 transition-colors mb-2 line-clamp-2">
                            {{ $vacante->titulo }}
                        </h3>
                    </a>

                    <p class="text-gray-600 mb-4 flex items-center">
                        <svg class="w-4 h-4 mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                  clip-rule="evenodd"/>
                        </svg>
                        Cierre: {{ $vacante->ultimo_dia->format('d/m/Y') }}
                    </p>

                    <div class="flex items-center text-gray-700 mb-4 line-clamp-1">
                        <svg class="w-4 h-4 mr-1 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                  clip-rule="evenodd"/>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                        </svg>
                        {{ $vacante->empresa }}
                    </div>

                    <div class="flex items-center text-lg font-semibold text-gray-900 mb-4">

                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" width="128" height="128"
                             viewBox="0 0 24 24">
                            <path fill="#eab308"
                                  d="M12 12.5a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M10.5 16a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/>
                            <path fill="#eab308"
                                  d="M17.526 5.116L14.347.659L2.658 9.997L2.01 9.99V10H1.5v12h21V10h-.962l-1.914-5.599zM19.425 10H9.397l7.469-2.546l1.522-.487zM15.55 5.79L7.84 8.418l6.106-4.878zM3.5 18.169v-4.34A3 3 0 0 0 5.33 12h13.34a3 3 0 0 0 1.83 1.83v4.34A3 3 0 0 0 18.67 20H5.332A3.01 3.01 0 0 0 3.5 18.169"/>
                        </svg>

                        {{ $vacante->salario->salario }}
                    </div>
                </div>

                <!-- Footer de la tarjeta mejorado -->
                <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-t border-gray-200 rounded-b-lg">
                    <div class="flex justify-end">
                        <a href="{{ route('vacantes.show', $vacante->id) }}"
                           class="group relative inline-flex items-center justify-center px-6 py-3 overflow-hidden font-medium text-yellow-700 transition duration-300 ease-out rounded-full shadow-lg hover:shadow-xl hover:ring-1 hover:ring-yellow-500">
                            <span class="absolute inset-0 bg-gradient-to-r from-yellow-400 to-yellow-500"></span>
                            <span
                                class="absolute flex items-center justify-center h-full w-full rounded-full bg-white group-hover:bg-opacity-0 transition-all duration-300 ease-in-out"></span>
                            <span class="relative flex items-center text-sm font-semibold tracking-wide">
                Ver detalles
                <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform"
                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </span>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No hay vacantes disponibles</h3>
                <p class="mt-1 text-gray-500">Prueba ajustando tus filtros de búsqueda.</p>
            </div>
        @endforelse
    </div>

    <!-- Paginación (si es necesario) -->
    @if($vacantes->hasPages())
        <div class="mt-8">
            {{ $vacantes->links() }}
        </div>
    @endif
</div>
