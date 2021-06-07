<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CardUser extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function board()
    {
        return $this->belongsTo('App\Models\Board');
    }
}
