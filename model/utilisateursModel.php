<?php

# Connexion de l'administrateur en utilisant password_verify
function connectUser(PDO $connect,string $login,string $pwd): bool

{
    trim($login);
    trim($pwd);

    $sql = "SELECT * FROM `utilisateur` WHERE `login` = ? AND `active` = 1";

    $request = $connect->prepare($sql);

    try {
        $request->execute([$login]);
        if($request->rowCount()===0) return false;
        $user = $request->fetch();
        $request->closeCursor();

        if(password_verify($pwd,$user['userpwd'])){
            $_SESSION = $user;
            unset($_SESSION['userpwd']);
            return true;
        }else{
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }

}


# Déconnexion de l'administrateur
function disconnectUser(): bool
{
    session_unset();

    if (ini_get("session.use_cookies")) { 
        $params = session_get_cookie_params(); 
        setcookie(session_name(), '', time() - 42000, 
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"] 
        );
    }

    session_destroy();

    return true;
}