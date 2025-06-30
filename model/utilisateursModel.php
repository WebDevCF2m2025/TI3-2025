<?php

# Connexion de l'administrateur en utilisant password_verify

# model/utilisateursModel.php

/**
 * @param PDO $connect
 * @param string $user
 * @param string $pwd
 * @return bool
 */
function authentificateActivedUser(PDO $connect, string $user, string $pwd): bool
{
    // protection des mauvais copié/collé trim()
    $login = trim($user);
    $userpwd = trim($pwd);

    // requête préparée avec le login SEULEMENT si l'utilisateur est actif
    $sql = "SELECT * FROM `utilisateurs` WHERE username=? ";
    $stmt = $connect->prepare($sql);

    try {
        $stmt->execute([$login]);
        if ($stmt->rowCount() === 0) return false;
        $utilisateur = $stmt->fetch();
        // bonne pratique
        $stmt->closeCursor();
        // vérification du mot de passe du formulaire
        // avec celui haché dans la DB
        if (password_verify($userpwd, $utilisateur['passwd'])) {
            // création de la session active
            $_SESSION = $utilisateur;
            // suppression du mot de passe
            unset($_SESSION['passwd']);
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

# Déconnexion de l'administrateur