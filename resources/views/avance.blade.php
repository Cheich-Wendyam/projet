<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vue Avancée</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/14ca515481.js" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            background-color: #f5f5f5;
            margin: 0;
        }
        .user-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            width: 100%;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .user-info .user-details {
            margin-right: 15px;
            text-align: right;
        }
        .user-info i {
            font-size: 30px;
            margin-right: 10px;
        }
        .user-info button {
            background-color: #eb7371;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            color: #fff;
            cursor: pointer;
        }
        .user-info button i {
            margin-right: 5px;
        }
        .container {
            margin-top: 20px;
            text-align: center;
        }
        .advanced-features {
            text-align: left;
            margin-top: 20px;
        }
        .advanced-features h2 {
            margin-bottom: 10px;
        }
        .advanced-features ul {
            list-style: none;
            padding: 0;
        }
        .advanced-features ul li {
            margin-bottom: 5px;
        }
        .advanced-features ul li a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <i class="fas fa-user-circle"></i>
        <div class="user-details">
            <h1>Bienvenue, {{ Auth::user()->name }}</h1>
            <p>{{ Auth::user()->email }}</p>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
        </form>
    </div>
    <div class="container">
        <div class="advanced-features">
            <h2>Fonctionnalités Avancées</h2>
            <ul>
                <li><a href="#">Réservations d'Hôtels</a></li>
                <li><a href="#">Réservations de Restaurants</a></li>
                <li><a href="#">Billets pour Musées</a></li>
                <li><a href="#">Itinéraires Personnalisés</a></li>
                <li><a href="#">Avis et Notations</a></li>
                <li><a href="#">Recherche Avancée</a></li>
                <li><a href="#">Guides de Voyage</a></li>
                <li><a href="#">Système de Récompenses</a></li>
                <li><a href="#">Support et Assistance</a></li>
                <li><a href="#">Intégration de Réseaux Sociaux</a></li>
            </ul>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
