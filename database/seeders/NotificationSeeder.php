<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TourBooking;
use App\Models\ShuttleBooking;
use App\Models\Testimonial;
use Filament\Notifications\Notification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Ensure at least one admin/user exists to receive notifications
        if (User::count() === 0) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@explorevistabali.com',
                'password' => bcrypt('password'),
            ]);
        }

        $admins = User::all();

        // 2. Fetch or create some Tour Bookings to generate notifications for
        $tourBookings = TourBooking::latest()->take(5)->get();
        if ($tourBookings->isEmpty()) {
            // Seed tours first if empty
            if (\App\Models\Tour::count() === 0) {
                $this->call(TourSeeder::class);
            }
            if (\App\Models\Package::count() === 0) {
                $this->call(PackageSeeder::class);
            }
            $tourBookings = TourBooking::factory()->count(5)->create();
        }

        // 3. Fetch or create some Shuttle Bookings to generate notifications for
        $shuttleBookings = ShuttleBooking::latest()->take(5)->get();
        if ($shuttleBookings->isEmpty()) {
            if (\App\Models\Shuttle::count() === 0) {
                $this->call(ShuttleSeeder::class);
            }
            if (\App\Models\Vehicle::count() === 0) {
                $this->call(VehicleSeeder::class);
            }
            if (\App\Models\ShuttleVehicle::count() === 0) {
                $this->call(ShuttleVehicleSeeder::class);
            }
            $shuttleBookings = ShuttleBooking::factory()->count(5)->create();
        }

        // 4. Fetch or create some Testimonials to generate notifications for
        $testimonials = Testimonial::latest()->take(5)->get();
        if ($testimonials->isEmpty()) {
            $testimonials = Testimonial::factory()->count(5)->create();
        }

        // Seed notifications for each admin
        foreach ($admins as $admin) {
            // Tour Booking Notifications
            foreach ($tourBookings as $booking) {
                $packageTitle = $booking->package?->title ?? 'Selected Package';
                $bookingDate = Carbon::parse($booking->booking_date)->format('d M Y');

                Notification::make()
                    ->title('New Booking Received')
                    ->body("📌 {$booking->customer_name} has booked the package '{$packageTitle}' on {$bookingDate}. People: {$booking->people_amount}.")
                    ->icon('heroicon-o-calendar')
                    ->color('primary')
                    ->sendToDatabase($admin);
            }

            // Shuttle Booking Notifications
            foreach ($shuttleBookings as $booking) {
                $shuttleType = $booking->shuttle?->type ?? 'shuttle';
                $bookingDate = Carbon::parse($booking->booking_date)->format('d M Y');

                Notification::make()
                    ->title('🚐 New Shuttle Booking Received')
                    ->body("📍 {$booking->customer_name} has booked a {$shuttleType} shuttle from {$booking->from} to {$booking->to} on {$bookingDate} at {$booking->pickup_time} WITA. 👥 People: {$booking->people_amount}.")
                    ->icon('heroicon-o-truck')
                    ->color('success')
                    ->sendToDatabase($admin);
            }

            // Testimonial Notifications
            foreach ($testimonials as $testimonial) {
                Notification::make()
                    ->title('New comment received')
                    ->body("{$testimonial->name} has just submitted a new testimonial.")
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('warning')
                    ->sendToDatabase($admin);
            }

            // Mark a portion of notifications as read so it looks like a realistic system
            $admin->notifications()
                ->inRandomOrder()
                ->limit(5)
                ->get()
                ->each(fn ($notification) => $notification->markAsRead());
        }
    }
}
