<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMotivationType extends Model
{
    protected $table = 'support_motivation_type';
    protected $fillable = ['support_motivation_id', 'type_motivation_id'];
    public $timestamps = false;
}
