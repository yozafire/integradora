<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use app\Http\Controllers\SupportController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Livewire\ChatComponent;
use App\Livewire\ProductListComponent;
use App\Livewire\TicketListComponent;
use App\Livewire\Actions;

// Ruta para logout de Livewire (si decides usar un componente Livewire para logout)
Route::post('/logout', [Logout::class, 'logout'])->name('logout');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Rutas para Livewire
Route::middleware(['auth'])->group(function () {
    // Rutas de Livewire para componentes como Chat, Productos, y Tickets
    Route::get('/chat', ChatComponent::class)->name('chat');
    Route::get('/productos', ProductListComponent::class)->name('productos');
    Route::get('/tickets', TicketListComponent::class)->name('tickets');
    
});

// Rutas para el control de usuarios
Route::resource('usuarios', UserController::class);

// Rutas para tickets
Route::resource('tickets', TicketController::class);

// Rutas para productos
Route::resource('productos', ProductController::class);

// Rutas para asistencia


// Rutas para roles
Route::resource('roles', RoleController::class);

// Rutas para soporte
Route::get('/soporte/tickets', [SupportController::class, 'index'])
    ->middleware('auth')
    ->name('soporte.tickets');

Route::post('/soporte/tickets/{id}/finalizar', [SupportController::class, 'finalizar'])
    ->middleware('auth')
    ->name('soporte.finalizar');

Route::post('/soporte/tickets/{id}/responder', [SupportController::class, 'responder'])
    ->middleware('auth')
    ->name('soporte.responder');

// Rutas administrativas
Route::get('admin', [AdminController::class, 'index'])->name('admin');

// Rutas de verificación de correo electrónico
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');


// Ruta para el ticket
Route::get('ticket', function () {
    return view('ticket'); // Esta vista debe ser creada
})->middleware(['auth'])->name('ticket');

Route::get('/ticket', function () {
    return view('ticket');
})->name('ticket');

// Ruta para crear un nuevo ticket
Route::post('ticket', [TicketController::class, 'create'])->middleware(['auth'])->name('ticket.create');
Route::post('/ticket/submit', [TicketController::class, 'submit'])->name('ticket.submit');


Route::get('/ticket/historial', [TicketController::class, 'historial'])->name('ticket.historial');


require __DIR__.'/auth.php';
