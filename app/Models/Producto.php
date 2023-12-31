<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;
/**
 * Class Producto
 *
 * @property $id
 * @property $codigo
 * @property $producto
 * @property $precio_compra
 * @property $precio_venta
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    protected $primaryKey = 'id';

  static $rules = [

    'codigo' => 'required',
    'producto' => 'required',
    'precio_compra' => 'required',
    'precio_venta' => 'required',
    'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ];

  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['codigo', 'producto', 'precio_compra', 'precio_venta', 'foto', 'id_categoria'];

  public function categoria()
  {
    return $this->belongsTo(Categoria::class);
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
