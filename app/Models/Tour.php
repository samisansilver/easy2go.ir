<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle',
        'period',
        'agency_id',
        'user_id',
        'price',
        'hotel_name',
        'hotel_rate',
        'is_active',
        'cover',
        'tourname',
        'description',
        'destination',
        'is_active'
    ];

    public function tAgency()
    {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function tUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
