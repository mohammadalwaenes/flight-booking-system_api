<?php

namespace Database\Factories;

use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class FlightFactory extends Factory
{
    protected $model = Flight::class;

    public function definition()
    {
        // استخدم الـ arrays من Booking إذا أردت
        $booking = new Booking();
        $airports = $booking->airports ?? ['JFK', 'LAX', 'ORD', 'ATL']; // مثال
        $airlines = $booking->airlines ?? ['Delta', 'United', 'American'];

        $origin = $this->faker->randomElement($airports);
        $destination = $this->faker->randomElement(array_diff($airports, [$origin]));

        return [
            'flight_number' => $this->faker->numberBetween(150, 1500),
            'airline' => $this->faker->randomElement($airlines),
            'origin' => $origin,
            'destination' => $destination,
            'boarding_time' => $this->faker->dateTimeBetween('+30 days', '+90 days'),
            'arrival_time' => $this->faker->dateTimeBetween('+31 days', '+32 days'),
        ];
    }
}