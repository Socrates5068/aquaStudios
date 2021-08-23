<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name= $this->faker->sentence(2);
        $category = Category::all()->random();
        return [
            'name' => $name,
            'image' => 'services/' . $this->faker->image('public/storage/services', 640, 480, null, false),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.9, 99.99]),
            'status' => 2,
            'category_id' => $category->id,
        ];
    }
}
