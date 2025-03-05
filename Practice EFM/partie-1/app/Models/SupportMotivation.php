<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SupportMotivation extends Model
{
    protected $fillable = ['content','image_id', 'views', 'reactions'];
    public function imageMotivation(): BelongsTo {
        return $this->belongsTo(imageMotivation::class, 'image_motivations_id');
    }
    public function typeMotivation(): BelongsToMany {
        return $this->belongsToMany(TypeMotivation::class, 'support_motivation_type');
    }
}
