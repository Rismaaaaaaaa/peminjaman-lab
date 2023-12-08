<?php
// database/seeders/BookingSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\User;
use App\Models\Laboratory;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{

    public function run()
    {
        $user = User::find(1);

        $labs = Laboratory::whereIn('id', [1, 2, 3])->get();

        // Create bookings for each month in the last year
        for ($i = 1; $i <= 12; $i++) {
            $bookingDate = Carbon::now()->subYear()->month($i)->startOfMonth();

            foreach ($labs as $lab) {
                $randomBookings = rand(3, 15);

                for ($j = 1; $j <= $randomBookings; $j++) {
                    $startTime = $bookingDate->copy()->addDays($j)->addHours(rand(9, 17)); // Random hour between 9 AM and 5 PM

                    Booking::create([
                        'user_id' => $user->id,
                        'labs_id' => $lab->id,
                        'start_time' => $startTime,
                        'end_time' => $startTime->copy()->addHours(2), // Assuming 2 hours booking
                        'created_at' => $bookingDate,
                        'updated_at' => $bookingDate,
                        'status' => 'accepted',
                    ]);
                }
            }
        }
    }
}
