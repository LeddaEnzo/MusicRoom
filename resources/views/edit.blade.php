<!-- Generate form to create a new Music -->
<form action="{{ route('music.edit', ['id' => $music->id]) }}" method="POST">
    @csrf
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="{{ $music->name }}" required>
    <label for="composer">Compositeur :</label>
    <input type="text" name="composer" id="composer" value="{{ $music->composer }}" required>
    <label for="game">Jeu :</label>
    <input type="text" name="game" id="game" value="{{ $music->game }}" required>   
    <label for="precision">Précision :</label>
    <input type="text" name="precision" id="precision" value="{{ $music->precision }}" required>
    <label for="link">Lien :</label>
    <input type="url" name="link" id="link" value="{{ $music->link }}" required>
    <button type="submit">Mettre à jour la musique</button>
</form>