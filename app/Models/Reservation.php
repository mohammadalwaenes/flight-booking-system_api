<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User; 
use App\Models\Flight;
use App\Models\Booking;

class Reservation extends Model
{
    use HasFactory;

    // الحقول التي يمكن ملؤها
    protected $fillable = [
        'user_id',
        'booking_id',
        'flight_id',
        'passenger_name',
        'passenger_email',
        'reservation_code',
        'origin',
        'destination',
        'airline',
        'status',
        'seat',
        'price',
        'tax',
        'assigned_flight_id',
    ];

    // الحقول المخفية عند التحويل إلى JSON (اختياري حسب الحاجة)
    protected $hidden = [
        'user_id',
        'booking_id',
        'flight_id',
        'assigned_flight_id',
        'created_at',
        'updated_at',
    ];

    // التحويل التلقائي لبعض الحقول
    protected $casts = [
        'price' => 'decimal:2',
        'tax' => 'decimal:2',
        'status' => 'string',
    ];

    // العلاقات
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'assigned_flight_id');
    }
}