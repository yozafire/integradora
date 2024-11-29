<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Responder Ticket') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if(session('error'))
                    <div class="bg-red-600 text-white py-2 px-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('soporte.responder', $ticket->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="titulo" class="block text-sm text-gray-400">Título del Ticket:</label>
                        <input type="text" id="titulo" class="w-full px-4 py-2 bg-gray-700 text-gray-200 rounded" value="{{ $ticket->titulo }}" disabled>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm text-gray-400">Descripción:</label>
                        <textarea id="descripcion" class="w-full px-4 py-2 bg-gray-700 text-gray-200 rounded" rows="3" disabled>{{ $ticket->descripcion }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="respuesta" class="block text-sm text-gray-200">Tu Respuesta:</label>
                        <textarea id="respuesta" name="respuesta" class="w-full px-4 py-2 bg-gray-700 text-gray-200 rounded" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                        Enviar Respuesta
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
