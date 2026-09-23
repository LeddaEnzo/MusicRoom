<h1>Liste des Musiques</h1>
<a href="{{ route('music.create') }}">Créer une nouvelle musique</a>
@foreach ($musics as $music)
    <h3>{{ $music->name }}</h3>
    <p>{{ $music->composer }}</p>
    <p>Game : {{ $music->game }}</p>
    <p>Types : 
        @foreach ($music->types as $type)
            {{ $type->name }}{{ !$loop->last ? ', ' : '' }}
        @endforeach
    </p>
    <a href="{{ route('music.show', ['id' => $music->id]) }}">Voir la musique</a>
    <a href="{{ route('music.edit_view', ['id' => $music->id]) }}">Modifier la musique</a>
    <a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a>
    </br>
@endforeach
