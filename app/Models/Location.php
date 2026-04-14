<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $fillable=[
        "location",
        "district",
        "division",
        "phone",
        "email",
    ];

    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    public function Rooms(){
        return $this->hasMany(Room::class);
    }
}
