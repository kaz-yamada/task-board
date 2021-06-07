<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    public function cardList()
    {
        return $this->hasOne('App\Models\CardList', 'id', 'card_list_id');
    }

    public function cardOwner()
    {
        return $this->hasOne('App\Models\User', 'id', 'card_owner');
    }

    public function board()
    {
        return $this->hasOneThrough('App\Models\Board', 'App\Models\CardList');
    }

    public function label()
    {
        return $this->hasOne('App\Models\Label', 'id', 'label_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->using('App\Models\CardUser');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments');
    }
}
