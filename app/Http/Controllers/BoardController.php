<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\CardList;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $data = Board::where('user_id', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return $this->render('Dashboard', ['data' =>  $data]);
    }

    public function show($boardId)
    {
        $data = [
            'board' => Board::where('id', $boardId)->first(),
            'list' => CardList::where('board_id', $boardId)->get()
        ];

        return $this->render('Board', ['data' => $data]);
    }

    public function store(Request $request)
    {
        // $newBoard = new Board;
        // $newBoard->user_id = auth()->id();
        // $newBoard->title = $request->title;
        // $newBoard->save();

        return redirect()->back()
            ->with('message', 'New board created successfully.');
    }
}
