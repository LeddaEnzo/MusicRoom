<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rating;

class Music extends Model
{
    protected $fillable = [
        'name',
        'composer',
        'game',
        'precision',
        'link'
    ];

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
