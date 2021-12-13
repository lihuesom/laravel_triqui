<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Init application
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        return view('index');
    }

    /**
     * Display create from via web
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        if ($request->input('playerName')) {
            $playerName = $request->input('playerName');
            $board = new Board();
            $board->fill([
                'player1' => $playerName,
                'player2' => '',
                'turn' => 1,
                'board' => [
                    1 => '',
                    2 => '',
                    3 => '',
                    4 => '',
                    5 => '',
                    6 => '',
                    7 => '',
                    8 => '',
                    9 => '',
                ],
            ]);
            if ($board->save()) {
                return redirect('/board/' . $board->id);
            }
        }
        return view('create');
    }

    /**
     * Display join form via web
     *
     * @param Request $request
     * @return void
     */
    public function join(Request $request)
    {
        return view('join');
    }

    /**
     * Display board. via web
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function board(Request $request, $id)
    {
        $board = Board::find($id);
        if ($board) {
            return view('board', ['board' => $board]);
        }
        return redirect('/');
    }

    /**
     * Refreshes the board via /api
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function getBoard(Request $request, $id)
    {
        $board = Board::find($id);
        if ($board) {
            return $board;
        }
        return redirect('/');
    }

    /**
     * makes a move on the board via /api
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function move(Request $request, $id)
    {
        $board = Board::find($id);
        if ($board) {
            $board->fill([
                'turn' => $board->turn == 1 ? 2 : 1,
                'board' => $request->input('board'),
            ]);
            if ($board->save()) {
                return $board;
            }
        }
        return redirect('/');
    }

    /**
     * test
     *
     * @param Request $request
     * @return void
     */
    public function listBoards(Request $request)
    {
        $boards = Board::all();
        print '<pre>';
        print_r($boards);
        print '</pre>';
    }

}
