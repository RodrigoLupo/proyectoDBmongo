<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crea un usuario utilizando el modelo y ajustándolo para MongoDB
        $user = new User([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123')
        ]);

        // Guarda el documento en la colección de MongoDB
        $user->save();
    }
}

