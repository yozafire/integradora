<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Middleware para autenticación
    }

    // Funciones comunes que puedan ser necesarias
}
