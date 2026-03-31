<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        $airports = ['JFK', 'LAX', 'ORD', 'ATL']; // مثال، أو استخدم property من الـ model
        $airlines = ['Delta', 'United', 'American'];

        $origin = $this->faker->randomElement($airports);
        $destination = $this->faker->randomElement(array_diff($airports, [$origin]));

        return [
            'user_id' => $this->faker->numberBetween(1, 1000),
            'reservation_time' => $this->faker->dateTime(),
            'status' => 'active',
            'price' => $this->faker->randomFloat(2, 90, 500),
            'promo_code' => Str::random(10),
            'tax' => $this->faker->numberBetween(2, 8),
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'airline' => $this->faker->randomElement($airlines),
            'origin' => $origin,
            'destination' => $destination,
            'passengers' => 1,
        ];
    }
}