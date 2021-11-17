<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            'image' => 'images/contact.webp',
            'address' => 'Pasaje héroes del chaco (Galeria A&A) AMB. 19',
            'telephone' => '61883536 - 76178827',
            'schedule' => 'Lunes a viernes de 9:00 a 16:00',
            'twitter' => 'https://twitter.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
            'whatsapp' => 'https://whatsapp.com',
        ]);
    }
}
