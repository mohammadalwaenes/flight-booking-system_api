<?php

namespace Database\Seeders;
use App\Models\Flight;
use App\Models\Booking;
use App\Models\Reservation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
        ]);

        Flight::factory(20)->create();

        Booking::factory(30)->create();

        Reservation::factory(40)->create();
    }
}