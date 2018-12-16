<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
