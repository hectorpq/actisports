<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importa el modelo User
use Illuminate\Support\Facades\Hash; // Importa Hash para la contraseña

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear una instancia de un nuevo usuario
        $user1 = new User();
        $user1->name = "Kevin";
        $user1->email = "kevindj13579@gmail.com"; // Añadir un email
        $user1->password = Hash::make("12345678"); // Hashea la contraseña
        $user1->save(); // Guarda el usuario en la base de datos

    }
}
