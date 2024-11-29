<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    // Relación con el usuario (el que crea el ticket)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}