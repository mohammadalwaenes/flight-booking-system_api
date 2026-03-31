<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status,

            'passengers' => $this->passengers,
            'airline' => $this->airline,
            'origin' => $this->origin,
            'destination' => $this->destination,

            'price' => $this->price,
            'tax' => $this->tax,
            'total_price' => $this->price + $this->tax,

            'reservation_time' => $this->reservation_time,

            // العلاقة
            'user' => [
                'id' => $this->user->id ?? null,
                'name' => $this->user->name ?? null,
                'email' => $this->user->email ?? null,
            ],

            // attributes المحسوبة
            'available_airports' => $this->airports,
            'available_airlines' => $this->airlines,

            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}