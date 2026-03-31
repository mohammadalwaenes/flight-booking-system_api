<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Flight;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;



    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'booking_id' => Booking::factory(),
            'flight_id' => Flight::factory(),

            'passenger_name' => fake()->name(),
            'passenger_email' => fake()->safeEmail(),

            // 🔥 أضف هذه
            'origin' => fake()->city(),
            'destination' => fake()->city(),
            'airline' => fake()->company(),
            'price' => fake()->randomFloat(2, 100, 1000),
            'tax' => fake()->numberBetween(5, 20),

            'seat' => fake()->numberBetween(1, 90) . strtoupper(fake()->randomLetter()),
        ];
    }
}