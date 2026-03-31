<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    // الحقول التي يمكن ملؤها
    protected $fillable = [
        'flight_number',
        'airline',
        'origin',
        'destination',
        'boarding_time',
        'arrival_time',
    ];

    // الحقول المخفية عند التحويل إلى JSON
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // تحويل الحقول الزمنية تلقائيًا
    protected $casts = [
        'boarding_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];
}