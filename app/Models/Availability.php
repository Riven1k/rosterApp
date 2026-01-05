<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'week_start_date', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function slots()
    {
        return $this->hasMany(AvailabilitySlot::class);
    }  
}
