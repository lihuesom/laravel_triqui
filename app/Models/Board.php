<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'player1',
        'player2',
        'board',
        'turn',
    ];

    protected $casts = [
        'board' => 'array',
        'turn' => 'integer',
    ];

    /**
     * Validate Winner
     */
    public function winner($playArray)
    {
        $winner = true;
        if (in_array(1, $playArray) && in_array(2, $playArray) && in_array(3, $playArray)) {
		    return $winner;
        }elseif (in_array(4, $playArray) && in_array(5, $playArray) && in_array(6, $playArray)) {
            return $winner;
        }elseif (in_array(7, $playArray) && in_array(8, $playArray) && in_array(9, $playArray)) {
            return $winner;
        }elseif (in_array(1, $playArray) && in_array(5, $playArray) && in_array(9, $playArray)) {
            return $winner;
        }elseif (in_array(3, $playArray) && in_array(5, $playArray) && in_array(7, $playArray)) {
            return $winner;
        }elseif (in_array(1, $playArray) && in_array(4, $playArray) && in_array(7, $playArray)) {
            return $winner;
        }elseif (in_array(2, $playArray) && in_array(5, $playArray) && in_array(8, $playArray)) {
            return $winner;
        }elseif (in_array(3, $playArray) && in_array(6, $playArray) && in_array(9, $playArray)) {
            return $winner;
        }else {
            return false;
        }
    }

    public function checkWinner($playBoard)
    {
        $playX = [];
        $playO = [];

        foreach ($playBoard as $key => $value) {
            if ($value == 'X') {
      			array_push($playX,$key);
            }
            elseif($value == 'O'){
            	array_push($palyO,$key);
            }
        }
        $winnerX = winner($playX);
        $winnerO = winner($playO);

        if ($winnerX == true) {
            return 'X'; ;
        }elseif ($winnerO == true) {
            return 'O';
        }else{
            return null;
        }
    }
    public function getStatus()
    {
        $board = $this->board;
        $winner = $this->checkWinner($board);

        return [
            'winner' => $winner,
            'status' => 'ongoing',
        ];
    }
}
