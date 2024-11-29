<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    use HasFactory, Notifiable;

    /**
     * Get the role associated with the user.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Determine if the user is an admin.
     */
    public function isAdmin()
    {
        return $this->role->name === 'Administrador';
    }

    /**
     * Determine if the user is a support agent.
     */
    public function isSupport()
    {
        return $this->role->name === 'Soporte';
    }

    /**
     * Determine if the user is a regular user.
     */
    public function isUser()
    {
        return $this->role->name === 'Usuario';
    }

        // Relación con roles (si estás usando una relación de muchos a muchos)
        public function roles()
        {
            return $this->belongsToMany(Role::class);
        }
    
        // Relación con tickets
        public function tickets()
        {
            return $this->hasMany(Ticket::class);
        }


        

}
