# TI3-2024
2024 - TI 3 – Carte interactive

## Description
Projet de carte interactive pour la promotion 2024 des webdevs du CF2m

## Objectifs
Création d’une carte interactive (carte utilisant OpenStreetMap) avec une interface d’administration privée accessible à un administrateur qui peut gérer, via un CRUD, les localisations à afficher sur la carte.

## Compétences évaluées
Créer une application web dynamique en utilisant :

### Partie 1 - Le 29 et 30 avril 2024
- **git** : création d'un `fork`, `clone` du `fork`, `création de branches`, `commits` réguliers, travail remis via un `pull request` sur **github**
- **WAMP** : création d’un hôte virtuel vers le dossier public du test
- **PHPMyAdmin** : création d’une base de données, et importation des deux fichiers SQL fournis (`utilisateurs.sql` et `localisations.sql`)
- **MySQL** ou **MariaDB** : exécution de requêtes SELECT, INSERT, UPDATE et DELETE. Avec requêtes préparées si nécessaires et gestion des erreurs
- **PHP** : respect du Modèle Vue Contrôleur (`MVC`) en PHP, mise en oeuvre d’un `CRUD`, utilisation des sessions pour un accès privé à l’interface d’administration, connexion à la base de données via `PDO`
- **HTML / CSS** : affichage de la carte et de la liste des localisations, responsive design et formulaire de connexion
- **JS** : récupération des données et intégration dans la carte et la liste
- **Bootstrap** : réalisation de l’interface d’administration

### Partie 2 - Pour la présentation (début mai 2024)
- **FTP** : Le travail est mis en ligne sur le serveur du stagiaire
- **SQL** : Le travail est mis en ligne sur un serveur de base de données
- **Présentation Publique** : Présenter son travail de manière cohérente 

## Marche à suivre pour démarrer le projet
- Créez un fork du projet `TI3-2024` sur `github.com`, puis clonez-le sur votre machine
- Créez un hôte virtuel dans WAMP sur le dossier `/TI3-2024/public/` nommé `TI3-2024`
- Créez une base de données (en MariaDB ou MySQL) dans phpMyAdmin nommée `TI3_2024`
- Importez les fichiers `data/utilisateurs.sql` et `localisations.sql` (donné par Pierre) dans la base de données `TI3_2024`
- Créez un fichier `config.php` dans le dossier `/TI3-2024/` et ajoutez-y les informations de connexion à la base de données dans des `constantes` PHP (Il se trouve déjà dans le `.gitignore` pour ne pas être commité)
- Dupliquez ensuite ce fichier en `config.php.ini` que l'on puisse installer votre site sur notre ordinateur pour la correction

  ## Accès à l'administration

  - Login : admin
  - Password : admin123
 
  # Bon travail !
 
