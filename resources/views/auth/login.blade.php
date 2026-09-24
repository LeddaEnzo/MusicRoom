<h1>Se connecter</h1>
<form method="POST" action="{{ route('login.store') }}">
    @csrf
    <div>
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
    </div>
    
    @error('email')
        <div>{{ $message }}</div>
    @enderror
    <button type="submit">Se connecter</button>
</form>