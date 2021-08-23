<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Fotografía',
                'icon' => '<i class="fas fa-camera"></i>',
            ],
            [
                'name' => 'Video',
                'icon' => '<i class="fas fa-video"></i>',
            ],
            [
                'name' => 'Fotografía y video',
                'icon' => '<i class="fas fa-photo-video"></i>',
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
