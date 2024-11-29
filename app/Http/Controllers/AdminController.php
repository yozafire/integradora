<?php 
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function listUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function listTickets()
    {
        $tickets = Ticket::all();
        return view('admin.tickets', compact('tickets'));
    }
}
