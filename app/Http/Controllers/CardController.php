<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
    }

    public function store(Request $request)
    {
        $newCard = new Card();
        $newCard->title = $request->title;
        $newCard->card_owner = auth()->id();
        $newCard->card_list_id = $request->list_id;
        $newCard->save();

        return redirect()->back()
            ->with('message', 'New card created successfully.');
    }
}
