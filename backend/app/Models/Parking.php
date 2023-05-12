<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
