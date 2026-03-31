<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'booking_id' => $this->booking_id,

            'passenger' => [
                'name' => $this->passenger_name,
                'email' => $this->passenger_email,
            ],

            'reservation_code' => $this->reservation_code,

            'route' => [
                'origin' => $this->origin,
                'destination' => $this->destination,
            ],

            'airline' => $this->airline,
            'seat' => $this->seat,

            'status' => $this->status,

            'assigned_flight_id' => $this->assigned_flight_id,

            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}