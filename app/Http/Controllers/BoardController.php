<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function boards(Request $request)
    {
        return Board::all();
    }

    public function cardLists(Request $request, $boardId)
    {
        return CardList::where('board_id', $boardId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function newBoard(Request $request)
    {
        $newBoard = new Board;
        $newBoard->board_owner = Auth::id();
        $newBoard->name = $request->name;
        $newBoard->save();

        return Inertia::render('Boards');
    }
}
