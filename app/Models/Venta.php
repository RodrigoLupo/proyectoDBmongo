<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
class Venta extends Model
{
    protected $primaryKey = 'id';

  protected $fillable = ['total', 'id_cliente', 'id_usuario'];

  public function detalleventa()
  {
    return $this->hasMany(Detalleventa::class);
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
