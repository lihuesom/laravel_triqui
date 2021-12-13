<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            .board {
                width: calc(100px * 3 + 2rem);
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                grid-template-rows: 1fr 1fr 1fr;
                gap: 1rem;
                grid-template-areas:
                    ". . ."
                    ". . ."
                    ". . .";
            }
            .box {
                width: 100px;
                height: 100px;
                border: 1px solid black;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 50px;
                font-weight: bold;
                color: #fff;
                background-color: #000;
                cursor: pointer;
            }
        </style>

    </head>
    <body class="antialiased">
        <div class="board">
            @foreach ($board->board as $boxId => $box)
                <div class="box" data-box="{{ $boxId }}">
                    {{ $box }}
                </div>
            @endforeach
        </div>

        <div>
            Jugadores: {{ $board->player1 }} vs {{ $board->player2 }}
        </div>
        <div>
            Turno: {{ $board->turn == 1 ? $board->player1 : $board->player2 }}
        </div>
        <div>
            {{print_r($board->board)}}
        </div>
    </body>
</html>
