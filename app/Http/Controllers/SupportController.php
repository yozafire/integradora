<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class SupportController extends BaseController
{
    public function showTickets()
    {
        $tickets = Ticket::where('status', 'Nuevo')->get();
        return view('support.tickets', compact('tickets'));
    }

    public function respondTicket($ticketId, Request $request)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->update([
            'status' => 'En progreso',
            'response' => $request->response,
        ]);

        return redirect()->route('support.tickets'); // Redirige a la lista de tickets
    }
}

