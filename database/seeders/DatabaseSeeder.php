<?php

namespace Database\Seeders;

use App\Models\Inquilino;
use App\Models\Propiedad;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Propiedad::factory(50)->create();
        Inquilino::factory(50)->create();
       


        User::create([
            'name' => 'Admin',
            'email' => 'iscmarko@hotmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
