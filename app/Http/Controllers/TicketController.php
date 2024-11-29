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

    // Función para mostrar un formulario de creación
    public function create()
    {
        return view('tickets.create');
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
