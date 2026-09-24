<!DOCTYPE html>
@php
    use Illuminate\Support\Facades\Auth;
@endphp

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
        @if (Auth::check())
            <h2>Noter cette musique</h2>

            <form method="POST" action="{{ route('music.rate', ['id' => $music->id]) }}">
                @csrf

                <label for="rating">Votre note :</label>

                <select name="rating" id="rating">
                    <option value="1">1 / 10</option>
                    <option value="2">2 / 10</option>
                    <option value="3">3 / 10</option>
                    <option value="4">4 / 10</option>
                    <option value="5">5 / 10</option>
                    <option value="6">6 / 10</option>
                    <option value="7">7 / 10</option>
                    <option value="8">8 / 10</option>
                    <option value="9">9 / 10</option>
                    <option value="10">10 / 10</option>
                </select>

                <button type="submit">Noter</button>
            </form>
        @else
            <p>
                <a href="{{ route('login') }}">Connectez-vous</a>
                pour noter cette musique.
            </p>
        @endif
        <button><a href="{{ route('music.list') }}">Retour à la liste des musiques</a></button>
        <button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
        <button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>
    </body>
</html>