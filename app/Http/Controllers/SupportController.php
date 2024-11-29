<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Respuesta;
use App\Models\User;

class SupportController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['user'])
            ->orderBy('estado')
            ->get();

        return view('soporte.tickets', compact('tickets'));
    }

    public function finalizar(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->estado = 'Finalizado';
        $ticket->fecha_fin = now();
        $ticket->save();

        return redirect()->route('soporte.tickets')
            ->with('success', 'Ticket finalizado exitosamente.');
    }

    public function responder(Request $request, $id)
    {
        $request->validate([
            'mensaje' => 'required|string',
        ]);

        Respuesta::create([
            'id_ticket' => $id,
            'id_usuario' => auth()->id(),
            'mensaje' => $request->mensaje,
        ]);

        return redirect()->route('soporte.tickets')
            ->with('success', 'Respuesta enviada exitosamente.');
    }
}
