<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Marcos Socrates Suyo Mendoza',
            'email' => 'correo@correo.com',
            'password' => bcrypt('123456')
        ]);
    }
}
