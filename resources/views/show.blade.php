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
        @if (session('success'))
            <script>alert(@json(session('success')));</script>
        @endif

        <nav class="music-nav">
            <button><a href="{{ route('music.list') }}">Retour à la liste des musiques</a></button>
            <button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
            <button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>
        </nav>

        <div class="music-image-placeholder">
            Image de la musique
        </div>

        <div class="music-main-info">
            <div class="music-rating">
                <div>
                    <span> Note Moyenne : </span>
                    @if ($averageRating !== null)
                        <strong>{{ number_format($averageRating, 1) }}/10</strong>
                    @else
                        <strong>-</strong>
                    @endif
                </div>

                <div>
                    <span> Votre Note : </span>

                    @if (Auth::check() && $userRating)
                        <strong>{{ $userRating->rating }}/10</strong>
                    @else
                        <strong> - </strong>
                    @endif
                </div>

                @if (Auth::check())
                    <form method="POST" action="{{ route('music.rate', ['id' => $music->id]) }}">
                        @csrf

                        <label for="rating">Votre note :</label>

                        <select name="rating" id="rating">
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}"
                                    @if ($userRating && $userRating->rating == $i) selected @endif>
                                    {{ $i }} / 10
                                </option>
                            @endfor
                        </select>

                        <button type="submit">
                            {{ $userRating ? 'Modifier Note' : 'Noter' }}
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Connectez-vous</a>
                @endif
            </div>

            <div class="music-details">

                <h1>{{ $music->name }}</h1>
                <h2>{{ $music->composer }}</h2>

                <hr>

                <h3>{{ $music->game }}</h3>
                <p>{{ $music->precision }}</p> </br></br>
                <a href="{{ $music->link }}" target="_blank">{{ $music->link }}</a>
            </div>
        </div>

    <hr>

    <div class="comments-section">
        <div>
            <h2>Commentaires</h2>

            @if ($comments->isEmpty())
                <p>Aucun commentaire pour le moment.</p>
            @else
                @foreach ($comments as $comment)
                    <div>
                        <strong>{{ $comment->user->name }}</strong>

                        <small>
                            {{ $comment->created_at->format('d/m/Y H:i') }}
                        </small>

                        <p>{{ $comment->content }}</p>
                        @if (Auth::check() && $comment->user_id === Auth::id())
                            <a href="{{ route('comment.edit', ['id' => $comment->id]) }}">
                                Modifier
                            </a>

                            <a href="{{ route('comment.delete', ['id' => $comment->id]) }}">
                                Supprimer
                            </a>
                        @endif
                    </div>

                    <hr>
                @endforeach
            @endif
        </div>

        <div class="comment-form">
            @if (Auth::check())
                <h2>Ajouter un commentaire</h2>

                <form method="POST" action="{{ route('music.comment', ['id' => $music->id]) }}">
                    @csrf

                    <textarea
                        name="content"
                        id="content"
                        rows="5"
                        cols="50"
                        maxlength="1000"
                        required
                        placeholder="Écrivez votre commentaire..."
                    ></textarea>

                    <br>

                    @error('content')
                        <p>{{ $message }}</p>
                    @enderror

                    <button type="submit">Publier</button>
                </form>
            @else
                <p>
                    <a href="{{ route('login') }}">Connectez-vous</a>
                    pour commenter cette musique.
                </p>
            @endif
        </div>
    </div>

    </body>
</html>