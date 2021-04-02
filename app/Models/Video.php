<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug', 'title', 'description',
        'date_active', 'reward', 'percentage', 'password',
        'balance',
    ];
    
    public function watches()
    {
        return $this->hasMany(Watch::class);
    }
}
