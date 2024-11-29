<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends \Illuminate\Routing\Controller
{
    /**
     * Verifica si el usuario es un administrador.
     */
    protected function isAdmin()
    {
        return Auth::user() && Auth::user()->hasRole('admin');
    }

    /**
     * Verifica si el usuario es un soporte.
     */
    protected function isSupport()
    {
        return Auth::user() && Auth::user()->hasRole('soporte');
    }

    /**
     * Verifica si el usuario es un cliente.
     */
    protected function isUser()
    {
        return Auth::user() && Auth::user()->hasRole('user');
    }
    /**
 * Respuesta estándar en formato JSON.
 */
protected function jsonResponse($data, $status = 200)
{
    return response()->json($data, $status);
}

}
