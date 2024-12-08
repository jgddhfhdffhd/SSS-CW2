<?php

namespace Database\Factories;

use App\Models\Celebrity;
use Illuminate\Database\Eloquent\Factories\Factory;

class CelebrityFactory extends Factory
{
    protected $model = Celebrity::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'bio' => $this->faker->text(100),
            'description' => $this->faker->text(200),
        ];
    }
}
