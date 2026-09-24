<!-- Generate form to create a new Music -->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MusicRoom</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <form action="{{ route('music.edit', ['id' => $music->id]) }}" method="POST">
            @csrf
            <label for="name">Nom :</label>
            <input type="text" name="name" id="name" value="{{ $music->name }}" required> </br>
            <label for="composer">Compositeur/Chanteur(s) :</label>
            <input type="text" name="composer" id="composer" value="{{ $music->composer }}" required> </br>
            <label for="game">Jeu :</label>
            <input type="text" name="game" id="game" value="{{ $music->game }}" required>   </br>
            <label for="precision">Précision :</label>
            <input type="text" name="precision" id="precision" value="{{ $music->precision }}" required> </br>
            <label for="link">Lien :</label>
            <input type="url" name="link" id="link" value="{{ $music->link }}" required>
            </br></br>
            <button type="submit">Mettre à jour la musique</button>
        </form>
    </body>
</html>