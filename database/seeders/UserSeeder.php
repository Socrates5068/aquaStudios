<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        User::create([
            'name' => 'Marcos Socrates Suyo Mendoza',
            'email' => 'correo@correo.com',
            'celphone' => '76178827',
            'password' => bcrypt('123456'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Socrates Marcos',
            'email' => 'correo2@correo.com',
            'celphone' => '76178827',
            'password' => bcrypt('123456'),
        ])->assignRole('admin');

        User::factory(100)->create();
    }
}
