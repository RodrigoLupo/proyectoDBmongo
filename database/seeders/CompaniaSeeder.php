<?php

namespace Database\Seeders;

use App\Models\Compania;
use Illuminate\Database\Seeder;

class CompaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Modifica el modelo y los datos para MongoDB
        $compania = new Compania([
            'nombre' => 'Libreria Feli',
            'correo' => 'info@gmail.com',
            'telefono' => '954632132',
            'direccion' => 'Perú-Arequipa',
        ]);

        // Guarda el documento en la colección de MongoDB
        $compania->save();
    }
}

