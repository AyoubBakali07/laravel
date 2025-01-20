<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'commentable_id', 'commentable_type'] ;
    public function Commentable()
    {
        return $this->morphTo();
    }
    // Methode to get the latest comment
    public static function latestComment() {
        return self::latest()->get();
    }
}
