<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'id';

    static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required'
      ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }
    protected static function boot()
    {
        parent::boot();

        // Utilizar el evento "creating" para asignar un nuevo valor a "id"
        static::creating(function ($categoria) {
            $ultimoRegistro = self::orderBy('id', 'desc')->first();

            // Obtener el último "id" y asignar uno nuevo autoincrementado
            $nuevoId = ($ultimoRegistro) ? $ultimoRegistro->id + 1 : 1;

            // Asignar el nuevo "id" al modelo antes de guardarlo
            $categoria->id = $nuevoId;
        });
    }
}
