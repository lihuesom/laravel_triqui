<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boardsTable = DB::table('boards');
        $boardsTable->insert([
            'player1' => 'Bichota',
            'player2' => 'foo fighters',
            'board' => json(array(
                1=>'X',
                2=>'O',
                3=>'X',
                4=>'O',
                5=>'X',
                6=>'0',
                7=>'X',
                8=>'0',
                9=>'X',
            )),
        ]);
        $boardsTable->insert([
            'player1' => 'Chilindrina',
            'player2' => 'Chavo',
            'board' => json(array(
                1=>'X',
                2=>'X',
                3=>'X',
                4=>'X',
                5=>'X',
                6=>'0',
                7=>'X',
                8=>'0',
                9=>'X',
            )),
        ]);
    }
}
