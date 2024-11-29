<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Agrega user_id a fillable
    protected $fillable = ['title', 'description', 'user_id'];

    // Si tienes otras relaciones o configuraciones, también deberían ir aquí
}
