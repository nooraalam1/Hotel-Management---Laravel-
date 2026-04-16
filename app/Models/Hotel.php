<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    protected $fillable=['title','image','location_id','phone','email','status','location'];

    public function location(){
        return $this->belongsTo(Location::class);
    }
}
