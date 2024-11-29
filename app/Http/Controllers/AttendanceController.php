<?
namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function store(Request $request)
    {
        // Registra la asistencia al inicio de sesión
        $attendance = Attendance::create([
            'user_id' => auth()->user()->id,
            'login_time' => now(),
        ]);

        return redirect()->route('home'); // o cualquier vista que desees
    }

    // Función para marcar la salida (si es necesario)
    public function logout()
    {
        $attendance = Attendance::where('user_id', auth()->user()->id)
            ->whereNull('logout_time')
            ->first();
        
        if ($attendance) {
            $attendance->update(['logout_time' => now()]);
        }

        return redirect()->route('home');
    }
}
