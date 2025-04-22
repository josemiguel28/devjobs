<x-app-layout>

    <x-slot:title>
        Gestión de Transacciones
    </x-slot:title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestión de Transacciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <livewire:transacciones.components.mostrar-transacciones/>
    </div>
</x-app-layout>
