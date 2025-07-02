<?php
# TI3-2025-Sam/model/utilisateursModel.php

# Connexion de l'administrateur en utilisant password_verify
/**
 * Connexion de l'utilisateur
 * @param PDO $con
 * @param string $userLogin
 * @param string $userPwd
 * @return bool
 *
 */
function connectUser(PDO $con, string $userLogin, string $userPwd): bool
{
    // On va protéger des espaces au début et à la fin des variables de connexions.
    $userLogin = trim($userLogin);
    $userPwd = trim($userPwd);

    // Requête préparée que sur le login (champ unique)
    $request = $con->prepare("SELECT * FROM `utilisateurs` WHERE `username` = ?");
    try{
        $request->execute([$userLogin]);
        // On a récupéré personne
        if ($request->rowCount() === 0) return false;

        // On a donc UN utilisateur
        // Transformation en tableau associatif
        $result = $request->fetch();

        //bonne pratique
        $request->closeCursor();

        // On va vérifier le mot de passe entre celui passé par le formulaire et celui venant de la DB
        if(password_verify($userPwd, $result['passwd'])) {
            // par sécurité (extrême) sur les sessions
            // en cas de tentative de reconnexion, on supprime
            // l'ancienne session (cookie + fichier texte)
            // et on régénère un identifiant
            session_regenerate_id(true);
            // On met en session tout ce qu'on a été récupéré de la requête
            $_SESSION = $result;

            // Suppression du mot de passe
            unset($_SESSION['passwd']);
            return true;
        } else {
            return false;
        }
    } catch (Exception $e){
        die($e->getMessage());
    }
}

# Déconnexion de l'administrateur
/**
 * Déconnexion de l'utilisateur
 */
function disconnectUser(): bool
{
    // Suppression des variables de sessions
    session_unset();

    // Suppression du coolie côté browser / utilisateur
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
        );
    }

    // Destruction du fichier lié sur le serveur
    session_destroy();

    // Envoi de true pour éviter un comportement asynchrone
    return true;
}