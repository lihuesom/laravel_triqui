<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">

        <a href="{{ url('/create') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Crear partida</a>
        <h2>Unirse a partida</h2>

        <form method="POST" action="/join">
            @csrf

            <div>
                <label for="boardId">ID Tablero</label>

                <input id="boardId" name="boardId" type="number" class="@error('boardId') is-invalid @enderror">

            </div>
            <div>
                <label for="playerName">Nombre del jugador</label>

                <input id="playerName" name="playerName" type="text" value="{{ $playerName ?? '' }}" class="@error('playerName') is-invalid @enderror">

            </div>

            <div>
                {{ $error ?? '' }}
            </div>

            <button type="submit">Unirse</button>
        </form>



    </body>
</html>
