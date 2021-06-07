<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index(Request $request)
    {
        $data = Board::ownedBoards()->orderBy('created_at', 'DESC')->get();
        return $this->render('Dashboard', ['data' =>  $data]);
    }

    public function show($id)
    {
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
        $newBoard->board_owner = auth()->id();
        $newBoard->title = $request->title;
        $newBoard->save();

        return redirect()->back()
            ->with('success', 'New board created successfully.');
    }

    public function update(Request $request, $id)
    {
        return redirect()->back()->with('success', 'Board updated successfully');
    }

    public function destroy($id)
    {
        $board = Board::find($id);
        $board->delete();
    }
}
