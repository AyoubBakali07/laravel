<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employe extends Model
{
    protected $fillable = ['name'];
    public function imageMotivation(): HasOne
    {
        return $this->hasOne(ImageMotivation::class);
    }
}
