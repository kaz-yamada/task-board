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
        return $this->hasOne('App\Models\User', 'id', 'card_owner');
    }

    public function cards()
    {
        return $this->hasManyThrough('App\Models\Card', 'App\Models\CardList', 'board_id', 'card_list_id', 'id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\BoardUser');
    }

    public function scopeOwnedBoards($query)
    {
        $user_id = auth()->id();
        return $query->where('board_owner', $user_id);
    }
}
