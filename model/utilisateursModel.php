<?php

# Connexion de l'administrateur en utilisant password_verify
function authentificateActivedUser(PDO $connect, string $login, string $pass): bool
{
    // protection des mauvais copié/collé trim()
    $login = trim($login);
    $userpwd = trim($pass);

    // requête préparée avec le login SEULEMENT si l'utilisateur est actif
    $sql = "SELECT * FROM `utilisateurs` WHERE username=? ";
    $stmt = $connect->prepare($sql);

    try {
        $stmt->execute([$login]);
        if ($stmt->rowCount() === 0)
            return false;
        $utilisateur = $stmt->fetch();
        // bonne pratique
        $stmt->closeCursor();
        // vérification du mot de passe du formulaire
        // avec celui haché dans la DB
        if (password_verify($userpwd, $utilisateur['passwd'])) {
            // création de la session active
            $_SESSION = $utilisateur;
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }

}


# Déconnexion de l'administrateur