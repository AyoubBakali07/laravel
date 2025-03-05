<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImageMotivation extends Model
{
    protected $fillable = ['url', 'employe_id', 'views'];
    public function employe(): BelongsTo {
        return $this->belongsTo(Employe::class, 'employe_id');
    }
    public function supportMotivations()
    {
        return $this->hasMany(SupportMotivation::class);
    }
}
