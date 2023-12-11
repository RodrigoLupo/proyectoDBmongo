<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
class Detalleventa extends Model
{
    protected $primaryKey = 'id';
  protected $table = 'detalleventa';
  protected $fillable = ['precio', 'cantidad', 'id_producto', 'id_venta'];

  public function venta()
  {
    return $this->belongsTo(Venta::class);
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
