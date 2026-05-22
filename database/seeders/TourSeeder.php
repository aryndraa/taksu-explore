<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::firstOrCreate([
            'name' => 'activities'
        ]);

        Tour::firstOrCreate([
            'name' => 'half-day'
        ]);
        
        Tour::firstOrCreate([
            'name' => 'full-day'
        ]);
    }
}
