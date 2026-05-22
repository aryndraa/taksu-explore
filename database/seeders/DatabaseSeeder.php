<?php

namespace Database\Seeders;

use App\Models\ShuttleVehicle;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TourBookingSeeder::class,
            ShuttleBookingSeeder::class,
            VehicleRentalSeeder::class,
            NotificationSeeder::class,
        ]);
    }
}
