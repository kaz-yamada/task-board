<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function show($id)
    {
        $data = Card::find($id);
        return $this->render('Card', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $newCard = new Card();
        $newCard->title = $request->title;
        $newCard->card_owner = auth()->id();
        $newCard->card_list_id = $request->list_id;
        $newCard->save();

        return redirect()->back()->with('success', 'New card created successfully.');
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->delete();
    }
}
