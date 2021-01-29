<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardList extends Model
{
    use HasFactory;

    public function cards()
    {
        return $this->hasMany('App\Models\Card');
    }

    public function board()
    {
        return $this->hasOne('App\Models\Board', 'id', 'board_id');
    }
}
