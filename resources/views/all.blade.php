@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MusicRoom</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <header>
        <h1>Liste des Musiques</h1>
        <button><a href="{{ route('music.create') }}">Créer une nouvelle musique</a></button>
    </header>
    <body>
        <div class="music-grid">
            @foreach ($musics as $music)
                <div class="music-card">
                    <h3>{{ $music->name }}</h3>
                    <p>Compositeur : {{ $music->composer}}</p>
                    <p>Jeu : {{ $music->game }}</p>
                    <p>Précision : {{ $music->precision }}</p>
                    <p>Lien : <a href="{{ $music->link }}" target="_blank">écouter la musique</a></p>
                    <div class="music-buttons">
                        <button><a href="{{ route('music.show', ['id' => $music->id]) }}">Voir la musique</a></button>
                        <button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
                        <button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>
                    </div>
                </div>
            @endforeach
            </br>
        </div>
        </br> </br>
        @if (Auth::check())
            <p>Connecté en tant que : {{ Auth::user()->name }}</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Se déconnecter</button>
            </form>
        @else
            <button><a href="{{ route('login') }}">Se connecter</a></button>
        @endif
    </body>
</html>