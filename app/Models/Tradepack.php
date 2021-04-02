<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tradepack extends Model
{
    use HasFactory;



    public function forexes()
    {
        return $this->hasMany('App\Models\Forex');
    }
}
