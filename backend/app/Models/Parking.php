<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parking extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'zone_id',
        'start_time',
        'end_time',
        'total_price',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public static function booted()
    {
        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
    public function scopeActive($query)
    {
        return $query->whereNull('end_time');
    }

    public function scopeStopped($query)
    {
        return $query->whereNotNull('stop_time');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
