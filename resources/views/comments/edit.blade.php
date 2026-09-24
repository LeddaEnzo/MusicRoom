<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier le commentaire</title>
    </head>

    <body>

        <h1>Modifier mon commentaire</h1>

        <form method="POST" action="{{ route('comment.update', ['id' => $comment->id]) }}">
            @csrf

            <textarea
                name="content"
                rows="5"
                cols="50"
                maxlength="1000"
                required
            >{{ $comment->content }}</textarea>

            <br>

            @error('content')
                <p>{{ $message }}</p>
            @enderror

            <button type="submit">
                Enregistrer
            </button>
        </form>

        <br>

        <a href="{{ route('music.show', ['id' => $comment->music_id]) }}">
            Annuler
        </a>

    </body>
</html>