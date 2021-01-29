<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $current_user_id = auth()->id();

        return Inertia::render('Boards', [
            'data' => Board::all()->where('board_owner', $current_user_id),
        ]);
    }

    public function show(Request $request, $boardId)
    {
        return CardList::where('board_id', $boardId)
            ->with('user')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function store(Request $request)
    {
        $newBoard = new Board;
        $newBoard->board_owner = Auth::id();
        $newBoard->name = $request->name;
        $newBoard->save();

        return redirect()->back()
            ->with('message', 'New board created successfully.');
    }
}
