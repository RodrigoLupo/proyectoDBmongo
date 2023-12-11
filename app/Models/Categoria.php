<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class Categoria extends Model
{
    protected $primaryKey = 'id';

  static $rules = [
    'nombre' => 'required'
  ];

  protected $table = 'categorias';

  protected $fillable = ['nombre'];

  public function productos()
  {
    return $this->hasMany(Producto::class);
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
