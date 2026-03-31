<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\Reservation;
use App\Models\Booking;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    /**
     * الحقول القابلة للملء
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'api_token'
    ];

    /**
     * الحقول المخفية عند التحويل إلى JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token'
    ];

    /**
     * التحويل التلقائي للحقول
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * العلاقات
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}