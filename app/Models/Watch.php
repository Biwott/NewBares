<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watch extends Model
{
    use HasFactory;
  
    protected $guarded = [];
    
    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
