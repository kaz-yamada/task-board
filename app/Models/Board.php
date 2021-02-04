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

    public function cards()
    {
        return $this->hasManyThrough(Card::class, CardList::class, 'board_id', 'card_list_id', 'id', 'id');
    }

    public function scopeUserBoards($query)
    {
        $user_id = auth()->id();
        return $query->where('user_id', $user_id);
    }
}
