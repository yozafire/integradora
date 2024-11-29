@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">📄 Tickets</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha Creación</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <td>{{ $ticket->user->name }}</td>
                <td>{{ $ticket->descripcion }}</td>
                <td>{{ $ticket->estado }}</td>
                <td>{{ $ticket->created_at }}</td>
                <td>{{ $ticket->fecha_fin ?? 'Sin fecha' }}</td>
                <td>
                    @if($ticket->estado !== 'Finalizado')
                        <button class="btn btn-primary" onclick="openResponderModal({{ $ticket->id }})">Responder</button>
                        <button class="btn btn-danger" onclick="openFinalizarModal({{ $ticket->id }})">Finalizar</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<x-modal id="responderModal">
    <form id="responderForm" method="POST" action="">
        @csrf
        <h5>Responder Ticket</h5>
        <textarea name="mensaje" class="form-control" rows="4" required></textarea>
        <button type="submit" class="btn btn-primary mt-3">Enviar</button>
    </form>
</x-modal>

<x-modal id="finalizarModal">
    <form id="finalizarForm" method="POST" action="">
        @csrf
        <h5>¿Estás seguro de que deseas finalizar este ticket?</h5>
        <button type="submit" class="btn btn-danger mt-3">Finalizar</button>
    </form>
</x-modal>

<script>
    function openResponderModal(ticketId) {
        const form = document.getElementById('responderForm');
        form.action = `/soporte/tickets/${ticketId}/responder`;
        document.getElementById('responderModal').showModal();
    }

    function openFinalizarModal(ticketId) {
        const form = document.getElementById('finalizarForm');
        form.action = `/soporte/tickets/${ticketId}/finalizar`;
        document.getElementById('finalizarModal').showModal();
    }
</script>
@endsection
