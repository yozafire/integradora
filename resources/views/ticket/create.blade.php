<!-- Verificar si hay un mensaje de éxito -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <div>
            <!-- Mostrar las opciones de redirección -->
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Regresar al inicio</a>
            <a href="{{ route('ticket.historial') }}" class="btn btn-secondary">Ver historial de tickets</a>
        </div>
    </div>
@endif

<!-- Aquí va el formulario para crear el ticket -->
<form action="{{ route('ticket.create') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="subject">Asunto</label>
        <input type="text" name="subject" id="subject" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Descripción</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Enviar Ticket</button>
</form>
