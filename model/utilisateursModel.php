<?php

# Connexion de l'administrateur en utilisant password_verify
function connectUser(PDO $con, string $userLogin, string $userPwd): bool
{
    // on va protéger des espaces au début et à la fin
    // des variables de connexions (copier/coller).
    
    $userPwd = trim($userPwd);
    // requête préparée que sur le login (champ unique)
    
    $request = $con->prepare("SELECT * FROM `utilisateurs` WHERE `username`= ?");
    try{
        $request->execute([$userLogin]);
        if($request->rowCount()===0) return false;

        // Получаем данные пользователя
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $request->closeCursor();

        if(password_verify($userPwd, $result['passwd'])){
            $_SESSION = $result;
            unset($_SESSION['passwd']);
            $_SESSION['login'] = true;
            return true;
        }else{
            return false;
        }

    }catch (Exception $e){
        die($e->getMessage());
    }
}

# Déconnexion de l'administrateur

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