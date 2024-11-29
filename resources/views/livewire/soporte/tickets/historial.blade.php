<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Historial de Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Verificación si hay tickets -->
                    @if($tickets->isEmpty())
                        <div class="text-center">
                            <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                No hay tickets disponibles en este momento.
                            </p>
                            <a href="{{ route('dashboard') }}" 
                               class="mt-3 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 dark:bg-blue-600 dark:hover:bg-blue-500">
                                Volver al inicio
                            </a>
                        </div>
                    @else
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Todos los Tickets:</h3>
                            <ul class="mt-4 space-y-4">
                                @foreach($tickets as $ticket)
                                    <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded shadow-lg hover:bg-gray-200 dark:hover:bg-gray-600">
                                        <p><strong class="text-gray-800 dark:text-gray-200">Asunto:</strong> {{ $ticket->titulo }}</p>
                                        <p><strong class="text-gray-800 dark:text-gray-200">Descripción:</strong> {{ $ticket->descripcion }}</p>
                                        <p><strong class="text-gray-800 dark:text-gray-200">Estado:</strong> {{ $ticket->estado }}</p>
                                        <p><strong class="text-gray-800 dark:text-gray-200">Fecha de Creación:</strong> {{ $ticket->created_at->format('d/m/Y H:i') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
