<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MusicRoom</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        <header>
            <h1>Liste des Musiques</h1>
            <button><a href="{{ route('music.create') }}">Créer une nouvelle musique</a></button>
        </header>
        <div class="music-grid">
            @foreach ($musics as $music)
                <div class="music-card">
                    <h3>{{ $music->name }}</h3>
                    <div class="music-info">
                        <strong>Compositeur : </strong>
                        <span>{{ $music->composer}}</span>
                        <strong>Jeu : </strong>
                        <span>{{ $music->game }}</span>
                        <strong>Précision : </strong>
                        <span>{{ $music->precision }}</span>
                        <br>
                    </div>
                    <div class="music-buttons">
                        <button><a href="{{ route('music.show', ['id' => $music->id]) }}">Voir la musique</a></button>
                        <button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
                        <button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>
                    </div>
                </div>
            @endforeach
            </br>
        </div>
    </body>
</html>