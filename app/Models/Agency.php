<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_name',
        'username',
        'password',
        'photo',
        'phone',
        'website',
        'mobile',
        'is_active'
    ];

    public function aUser()
    {
        return $this->hasMany(User::class);
    }

    public function aTour()
    {
        return $this->hasMany(Tour::class);
    }
}
