<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Models\User;

class Booking extends Model
{
    use HasFactory;

    // الحقول التي يمكن ملؤها
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'status',
        'passengers',
        'airline',
        'reservation_time',
        'origin',
        'destination',
        'price',
        'tax',
        'promo_code',
    ];

    // الحقول المخفية عند التحويل إلى JSON
    protected $hidden = [
        // 'user_id',
    ];

    // تحويل الحقول إلى أنواع مناسبة تلقائيًا
    protected $casts = [
        'reservation_time' => 'datetime',
        'price' => 'decimal:2',
        'tax' => 'decimal:2',
        'passengers' => 'integer',
    ];

    /**
     * العلاقة مع المستخدم
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * قائمة المطارات المتاحة
     */
    protected function airports(): Attribute
    {
        return Attribute::make(
            get: fn() => ['DFW','JFK','MSY','ZVE','BNA','YUL','MEX','LAX','LAS','JAX','IAH','BOS','AUS']
        );
    }

    /**
     * قائمة شركات الطيران المتاحة
     */
    protected function airlines(): Attribute
    {
        return Attribute::make(
            get: fn() => ['American','Southwest','Spirit','Alaska','Jet Blue','Frontier','Delta','United']
        );
    }
}