<?php

namespace Database\Factories;

use App\Models\Tour;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'tour_id'     => Tour::query()->inRandomOrder()->first()->id,
            'name'        => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'start_time'  => $this->faker->time(),
            'price'       => $this->faker->randomFloat(2, 50, 200),
            'is_active'   => $this->faker->boolean(80), // 80% chance of being active
        ];
    }
}
