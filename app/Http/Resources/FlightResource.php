<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'flight_number' => $this->flight_number,
            'airline' => $this->airline,

            'route' => [
                'origin' => $this->origin,
                'destination' => $this->destination,
            ],

            'schedule' => [
                'boarding_time' => $this->boarding_time,
                'arrival_time' => $this->arrival_time,
                'duration' => $this->calculateDuration(),
            ],

            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }

    private function calculateDuration()
    {
        if (!$this->boarding_time || !$this->arrival_time) {
            return null;
        }

        return \Carbon\Carbon::parse($this->boarding_time)
            ->diff(\Carbon\Carbon::parse($this->arrival_time))
            ->format('%h hours %i minutes');
    }
}