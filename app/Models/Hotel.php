<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    protected $fillable=['title','image','location','phone','email','status'];

    public function locations(){
        return $this->belongsTo(Location::class);
    }
}
