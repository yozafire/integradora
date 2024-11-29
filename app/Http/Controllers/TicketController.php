<?php 
// app/Http/Controllers/TicketController.php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Función para listar los tickets
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|string|in:baja,media,alta',
        ]);

        // Procesar el reclamo aquí (guardar en la base de datos, notificar, etc.)
        return back()->with('status', 'Reclamo enviado con éxito.');
    }

    // Función para mostrar un formulario de creación
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Crear el ticket
        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('ticket')->with('success', 'Ticket creado exitosamente');
    }
    // Función para almacenar un nuevo ticket
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Ticket::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'status' => 'Nuevo',
        ]);

        return redirect()->route('tickets.index');
    }

    // Función para mostrar un ticket específico
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tickets.show', compact('ticket'));
    }

    // Función para actualizar el estado de un ticket
    public function updateStatus(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'status' => $request->status,
        ]);

        return redirect()->route('tickets.index');
    }

    // Función para eliminar un ticket
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets.index');
    }
}
