<h1>{{ $music->name }}</h1>
<h3>{{ $music->composer }}</h3>
<p>{{ $music->game }}</p>
<p>Précision : {{ $music->precision }}</p>
<p>Lien : <a href="{{ $music->link }}" target="_blank">{{ $music->link }}</a></p>
</br>
<button><a href="{{ route('music.list') }}">Retour à la liste des musiques</a></button>
<button><a href="{{ route('music.edit.view', ['id' => $music->id]) }}">Modifier la musique</a></button>
<button><a href="{{ route('music.delete', ['id' => $music->id])}}">Supprimer la musique</a></button>