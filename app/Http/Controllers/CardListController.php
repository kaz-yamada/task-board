<?php

namespace App\Http\Controllers;

use App\Models\CardList;
use Illuminate\Http\Request;

class CardListController extends Controller
{

    public function store(Request $request, $board_id)
    {
        $newList = new CardList;
        $newList->title = $request->title;
        $newList->board_id = $board_id;
        $newList->save();

        return redirect()->back()
            ->with('message', 'New list created successfully.');
    }
}
