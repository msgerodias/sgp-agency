<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'countries',
        'earliest_fly_date',
        'call_time',
        'referred_by',
        'status',
        'remarks',
    ];

    protected $casts = [
        'countries' => 'array', // JSON -> array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
