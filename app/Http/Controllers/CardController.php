<?php

namespace App\Http\Controllers;

use App\Models\CardList;
use Illuminate\Http\Request;

class CardController extends Controller
{

    public function store(Request $request)
    {
        $newList = new CardList();
        $newList->save();

        return redirect()->back()
            ->with('message', 'New list created successfully.');
    }
}
