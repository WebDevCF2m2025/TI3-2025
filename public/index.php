<?php

//
session_start();

// Charger le fichier de configuration
require_once "../config-dev.php";

// Crée une connexion à la base de données
try {
  // connexion à la base de données
  $db = new PDO(DB_DSN, DB_LOGIN, DB_PWD,
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (Exception $e) {
  // s'il y a une erreur, on affiche le message d'erreur
  die($e->getMessage());
}

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['username'])) {
  // Si l'utilisateur est connecté, charger le contrôleur privé
  require_once "../controller/PrivateController.php";
} else {
  // Sinon, charger le contrôleur public
  require_once "../controller/PublicController.php";
}

// Si nous sommes en mode développement, afficher la barre de débogage
if (APP_MODE == "dev") :
  echo '<div class="bg-white p-4 rounded shadow-sm mb-5"><hr><h3>Barre de débogage</h3><hr>';
  echo '<h4>session_id() ou SID</h4>';
  var_dump(session_id());
  echo '<h4>$_GET</h4>';
  var_dump($_GET);
  echo '<h4>$_SESSION</h4>';
  var_dump($_SESSION);
  echo '<h3>$_POST</h3>';
  var_dump($_POST);
  echo '</div>';
endif;

//  fermeture de la connexion à la base de données
$db = null;