@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6 px-4">
    <h1 class="text-3xl font-bold text-gray-200 mb-6">Tickets Pendientes</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white py-2 px-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-600 text-white py-2 px-4 rounded mb-4">{{ session('error') }}</div>
    @endif

    @if($tickets->isEmpty())
        <p class="text-gray-400">No hay tickets pendientes.</p>
    @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full text-gray-200 bg-gray-800 border-collapse border border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-700 text-left">
                        <th class="px-4 py-2 border-b border-gray-600">#</th>
                        <th class="px-4 py-2 border-b border-gray-600">Título</th>
                        <th class="px-4 py-2 border-b border-gray-600">Descripción</th>
                        <th class="px-4 py-2 border-b border-gray-600">Estado</th>
                        <th class="px-4 py-2 border-b border-gray-600">Respuesta</th>
                        <th class="px-4 py-2 border-b border-gray-600">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr class="hover:bg-gray-700">
                        <td class="px-4 py-2 border-b border-gray-600">{{ $ticket->id }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">{{ $ticket->titulo }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">{{ $ticket->descripcion }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">{{ $ticket->estado }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">{{ $ticket->respuesta ?? 'Sin responder' }}</td>
                        <td class="px-4 py-2 border-b border-gray-600">
                            <form action="{{ route('soporte.responder', $ticket->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-blue-600 hover:bg-blue-700 text-white py-1 px-3 rounded">Responder</button>
                            </form>
                            <form action="{{ route('soporte.finalizar', $ticket->id) }}" method="POST" class="inline">
                                @csrf
                                <button class="bg-green-600 hover:bg-green-700 text-white py-1 px-3 rounded">Finalizar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
