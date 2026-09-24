<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MusicRoom</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <h1>{{ $music->name }}</h1>
        <h3>{{ $music->composer }}</h3>
        <p>{{ $music->game }}</p>
        <p>Précision : {{ $music->precision }}</p>
        <p>Lien : <a href="{{ $music->link }}" target="_blank">{{ $music->link }}</a></p>
        </br>
        <button><a href="{{ route('music.list') }}">Retour à la liste des musiques</a></button>
        <button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
        <button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>
    </body>
</html>