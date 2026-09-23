<h1>{{ $music->name }}</h1>
<h3>{{ $music->composer }}</h3>
<p>{{ $music->game }}</p>
<p>Précision : {{ $music->precision }}</p>
<p>Lien : <a href="{{ $music->link }}" target="_blank">{{ $music->link }}</a></p>