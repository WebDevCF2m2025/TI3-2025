<?php

# Connexion de l'administrateur en utilisant password_verify
/**
 * @param PDO $con
 * @param string $userLogin
 * @param string $userPwd
 * @return bool
 *
 */
function connectUser(PDO $con, string $userLogin, string $userPwd): bool
{
    // on va protéger des espaces au début et à la fin
    // des variables de connexions (copier/coller).
    $userLogin = trim($userLogin);
    $userPwd = trim($userPwd);
    // requête préparée que sur le login (champ unique)
    $request = $con->prepare("SELECT * FROM `utilisateurs` WHERE `username`= ?");
    try{
        $request->execute([$userLogin]);
        // on a récupéré personne
        if($request->rowCount()===0) return false;
        // on a donc UN utilisateur (champ unique),
        // transformation en tableau associatif
        $result = $request->fetch();
        // bonne pratique
        $request->closeCursor();
        // on va vérifier son mot de passe
        // entre celui passé par le formulaire et celui venant de la DB
        if(password_verify($userPwd,$result['passwd'])){
            // on met en session tout ce qu'on a été récupéré de la requête
            // tableau associatif = tableau associatif
            $_SESSION = $result;

            // suppression du mot de passe
            unset($_SESSION['passwd']);
            return true;
        }else{
            return false;
        }

    }catch (Exception $e){
        die($e->getMessage());
    }
}


# Déconnexion de l'administrateur

/**
 * @return bool
 */
function disconnectUser(): bool
{
    # suppression des variables de sessions
    session_unset();

    # suppression du cookie côté browser / utilisateur
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    # Destruction du fichier lié sur le serveur
    session_destroy();

    // envoi de true pour éviter un comportement asynchrone
    return true;
}