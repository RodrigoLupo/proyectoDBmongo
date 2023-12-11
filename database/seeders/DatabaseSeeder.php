<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ejecuta el seeder específico para MongoDB
        $this->call([
            CompaniaSeeder::class,
            UserSeeder::class,
        ]);

        // Puedes comentar o eliminar estas líneas si no necesitas seeders de Eloquent
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
