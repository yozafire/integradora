<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class SupportController extends Controller
{
    public function __construct()
    {
        // Verificar el rol en el constructor si se necesita un acceso general
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role != 'soporte') {
                return redirect()->route('dashboard'); // Redirige si no es soporte
            }
            return $next($request);
        })->only(['index', 'responder', 'finalizar']);
    }

    public function index()
    {
        // Obtener todos los tickets asignados al soporte
        $tickets = Ticket::where('estado', '!=', 'Finalizado')->get();

        // Retornar la vista de listado de tickets
        return view('soporte.tickets.index', compact('tickets'));
    }

    public function responder(Request $request, $id)
    {
        // Verificar que el usuario tenga acceso autorizado
        if (auth()->user()->role !== 'soporte') {
            return redirect()->route('dashboard')->with('error', 'Acceso no autorizado.');
        }
    
        if ($request->isMethod('get')) {
            // Obtener el ticket y mostrar el formulario
            $ticket = Ticket::findOrFail($id);
            return view('soporte.tickets.responder', compact('ticket'));
        }
    
        // Validar el formulario
        $request->validate([
            'respuesta' => 'required|string|max:1000',
        ]);
    
        // Actualizar el ticket con la respuesta
        $ticket = Ticket::findOrFail($id);
        $ticket->respuesta = $request->input('respuesta');
        $ticket->estado = 'En progreso'; // Cambiar estado
        $ticket->save();
    
        return redirect()->route('soporte.tickets')->with('success', 'Respuesta enviada correctamente.');
    }

    public function historial()
    {
        // Obtener los tickets del soporte autenticado
        $tickets = Ticket::all();
    
        // Retornar la vista con los tickets
        return view('soporte.tickets.historial', compact('tickets'));    }
}
