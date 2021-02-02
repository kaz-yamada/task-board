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

    public static function userBoards()
    {
        $user_id = auth()->id();
        return Board::where('user_id', $user_id);
    }
}
