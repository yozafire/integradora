<!-- resources/views/ticket.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Crear Ticket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Mostrar mensaje de éxito si existe -->
                    @if(session('success'))
                        <!-- Modal de éxito -->
                        <x-modal name="ticket-success" :show="session('success')" focusable>
                            <div class="p-6">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('¡Ticket creado con éxito!') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ session('success') }}
                                </p>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cerrar') }}
                                    </x-secondary-button>

                                    <a href="{{ route('dashboard') }}" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded-md ml-3">
                                        {{ __('Regresar al inicio') }}
                                    </a>

                                    <a href="{{ route('ticket.historial') }}" class="btn btn-secondary bg-gray-500 hover:bg-gray-700 text-white px-4 py-2 rounded-md ml-3">
                                        {{ __('Ver historial de tickets') }}
                                    </a>
                                </div>
                            </div>
                        </x-modal>
                    @else

                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('¿Tienes algún problema?') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Escribenos cual es y nosotros te ayudaremos') }}
                    </p>
                        <!-- Formulario para crear un nuevo ticket -->
                        <form method="POST" action="{{ route('ticket.create') }}" class="space-y-6">
                            @csrf
                            
                            <div class="mb-4">
                                <x-input-label for="title" :value="__('Asunto')" />
                                <x-text-input type="text" name="title" id="title" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Descripción')" />
                                <x-text-input type="text" name="description" id="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" />
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                    {{ __('Crear Ticket') }}
                                </button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
