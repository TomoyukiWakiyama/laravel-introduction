<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BoardController extends Controller
{
    //
    public function index()
    {
        $items = Board::all();
        // dd($items);
        return view('board.index', ['items'=>$items]);
    }
    public function add()
    {
        return view('board.add');
    }
    public function create(Request $request)
    {
        $this->validate($request, Board::$rules);
        $board = new Board;
        $form = $request->all();
        unset($form['__token']);
        $board->fill($form)->save();
        return redirect('/board');
    }
}
