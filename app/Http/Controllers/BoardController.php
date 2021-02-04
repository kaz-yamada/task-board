<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Card;
use App\Models\CardList;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $data = Board::userBoards()->orderBy('created_at', 'DESC')->get();
        return $this->render('Dashboard', ['data' =>  $data]);
    }

    public function show($id)
    {
        // TODO: clean this up? Add update and deletion for lists and cards

        $board = Board::find($id);
        $data = [
            'board' => $board,
            'lists' => $board->cardLists()->with('cards')->get()
        ];

        return $this->render('Board', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $newBoard = new Board;
        $newBoard->user_id = auth()->id();
        $newBoard->title = $request->title;
        $newBoard->save();

        return redirect()->back()
            ->with('message', 'New board created successfully.');
    }


    public function destroy($id)
    {
    }
}
