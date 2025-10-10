<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Booking::factory()->create();

        $bookings   = database_path('json/bookings.json');
        $json       = file_get_contents($bookings);
        $bookings   = json_decode($json);

        foreach ($bookings as $booking) {
            Booking::create([
                'user_id'           => $booking->user_id,
                'car_id'            => $booking->car_id,
                'start_date'        => $booking->start_date,
                'end_date'          => $booking->end_date,
                'total_price'       => $booking->total_price,
                'status'            => $booking->status,
                'payment_status'    => $booking->payment_status,
                'notes'             => $booking->notes,
            ]);
        }
    }
}
