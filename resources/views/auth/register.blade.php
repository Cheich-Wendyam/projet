<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription moderne</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1>S'inscrire</h1>
        <p class="choose-email">Utiliser mon e-mail:</p>
        <div class="inputs">
            <input type="text" name="name" placeholder="Nom" value="{{ old('name') }}" required>
            @error('name')
                <span>{{ $message }}</span>
            @enderror
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            <input type="password" name="password" placeholder="Mot de passe" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
            <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
        </div>
        <p class="inscription">J'ai déjà un <span>compte</span>. Je me <span><a href="{{ route('login') }}">connecte</a></span>.</p>
        <div align="center">
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>
