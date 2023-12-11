<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id';

  static $rules = [
    'nombre' => 'required',
    'telefono' => 'required',
    'direccion' => 'required'
  ];

  protected $fillable = ['nombre', 'telefono', 'direccion'];
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
