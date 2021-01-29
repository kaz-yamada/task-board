<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardUser extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function cards()
    {
        return $this->hasOne('App\Models\Card', 'id', 'card_id');
    }
}
