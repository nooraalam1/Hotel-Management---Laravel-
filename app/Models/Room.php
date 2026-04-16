<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    protected $fillable=[

        'room_title',
        'image',
        'description',
        'price',
        'facility',
        'room_type',
    ];
    public function locations(){
        return $this->belongsTo(Location::class);
    }
    public function hotels(){
        return $this->belongsTo(Hotel::class);
    }
}
