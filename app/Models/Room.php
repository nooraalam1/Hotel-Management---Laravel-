<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $fillable=[

        'location_id',
        'hotel_id',
        'hotel_title',
        'image',
        'description',
        'price',
        'facility',
        'room_type',
        'room_number',
        'bed_type',
        'status',
    ];
    public function locations(){
        return $this->belongsTo(Location::class);
    }
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
}
