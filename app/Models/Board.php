<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function cardLists()
    {
        return $this->hasMany('App\Models\CardList');
    }

    public function boardOwner()
    {
        return $this->hasOne('App\Models\User');
    }
}
