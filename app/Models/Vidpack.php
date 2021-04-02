<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidpack extends Model
{
    use HasFactory;
    public function vidsubs()
    {
        return $this->hasMany('App\Models\Vidsub');
    }
}
