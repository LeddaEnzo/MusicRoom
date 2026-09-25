<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <h1>Mon compte</h1>

    <p>Bienvenue {{ $user->name }}</p>
    <h2>Mes notes</h2>

    @if ($ratings->isEmpty())

        <p>Vous n'avez encore noté aucune musique.</p>

    @else

        @foreach ($ratings as $rating)

            <div>
                <a href="{{ route('music.show', ['id' => $rating->music->id]) }}">
                    {{ $rating->music->game }} - {{ $rating->music->name }}
                </a>

                <span>
                    {{ $rating->rating }}/10
                </span>
            </div>

        @endforeach

    @endif

    <h2>Mes commentaires</h2>

@if ($comments->isEmpty())

    <p>Vous n'avez encore écrit aucun commentaire.</p>

@else

    @foreach ($comments as $comment)

        <div>
            <a href="{{ route('music.show', ['id' => $comment->music->id]) }}">
                {{ $comment->music->game }} - {{ $comment->music->name }}
            </a>

            <p>
                {{ $comment->content }}
            </p>

            <small>
                {{ $comment->created_at->format('d/m/Y à H:i') }}
            </small>
        </div>

    @endforeach

@endif

</body>
</html>