<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public function comments()
    {
        return $this->morphMany(comment::class,'commentable');
    }
}