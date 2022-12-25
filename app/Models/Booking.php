<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $guarded = false;

    public function time(){
        return $this->belongsTo(WorkingTime::class, 'time_id', 'id');
    }
}
