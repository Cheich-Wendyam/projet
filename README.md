OuagaLaBelle est projet de creation de site web avec laravel pour valoriser le potentiel touristique de Ouagadougou.

Avant lancer le site assurer de vous de respecter ces consignes:

Installer les dependances de  composer 

tapez la commande "composer Install"

Creer une copie du fichier .env 

 "cp .env.example .env"

Générer la clé de cryptage de l'application

"php artisan key:generate"

Creer une base de données nommée "projet" et importer le script sql joint aux fichiers

Après cela, configurer votre fichier .env afin de permettre à laravel de se connecter à votre base de données
Vous pouvez maintenant lancer la commande "php artisan serve" pour demarrer le site

il ya une partie admin et une partie pour utilisateur Simple
il suffit de suivre le lien http://localhost:8000 pour acceder à la partie reserver aux utilisateurs simple (le front end)
et http://localhost:8000/admin pour acceder a la partie admin
l'admin principal à pour accès: mail (cheich@gmail.com) pwd(wendyam)
vous pouvez Creer egalement d'autres utilisateurs admin à travers la commande 
"php artisan voyager:admin 'votremail' --create" ou en accedant au panneau d'administration et en créer

dans le panel d'administration vous avez la possibilité de gerer les sites, restaurants, hotels, espaces ...