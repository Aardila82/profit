<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nombre' => 'Admin',
            'apellido' => 'Principal',
            'username' => 'admin',
            'email' => 'admin@profit.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'must_change_password' => false,
        ]);

        $this->call(PlansTableSeeder::class);
    }
}
