<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion moderne</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Se connecter</h1>
        <p class="choose-email">Utiliser mon e-mail:</p>
        <div class="inputs">
            <input type="email" name="email" placeholder="Email" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            <input type="password" name="password" placeholder="Mot de passe" required>
            @error('password')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <span><a href="{{ route('register') }}">crée</a></span> un.</p>
        <div align="center">
            <button type="submit">Se connecter</button>
        </div>
    </form>
</body>
</html>
