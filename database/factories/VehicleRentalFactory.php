<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VehicleRental>
 */
class VehicleRentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rentalDate = $this->faker->dateTimeBetween(date('Y') . '-01-01', date('Y') . '-12-31');
        $returnDate = (clone $rentalDate)->modify('+' . $this->faker->numberBetween(1, 14) . ' days');

        return [
            'customer_name'  => $this->faker->name(),
            'customer_phone' => $this->faker->phoneNumber(),
            'customer_email' => $this->faker->optional()->safeEmail(),
            'vehicle_id'     => Vehicle::query()->inRandomOrder()->first()->id,
            'rental_date'    => $rentalDate->format('Y-m-d'),
            'return_date'    => $returnDate->format('Y-m-d'),
            'status'         => $this->faker->randomElement(['pending', 'confirmed', 'cancelled', 'completed', 'ongoing', 'expired']),
        ];
    }
}
