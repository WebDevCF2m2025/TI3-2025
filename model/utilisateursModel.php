<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['login'] = $utilisateur['username'];
            $_SESSION['id'] = $utilisateur['idutilisateurs'];
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }

}


# Déconnexion de l'administrateur

function disUser(): bool
{
    // bonne pratique, suppression des variables de session
    // méthode tableau : $_SESSION = [];
    session_unset();

    // Si vous voulez détruire complètement la session, effacez également
    // le cookie de session.
    if (ini_get("session.use_cookies")) { // existence cookie
        $params = session_get_cookie_params(); // si oui, on récupère ses paramètres
        setcookie(
            session_name(),
            '',
            time() - 42000, // on recrée un cookie qui porte le même non (PHPSESSID par défaut), on le met loin dans le passé (+-11h)
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"] // on garde les mêmes propriétés
        );
    }

    // Finalement, on détruit le fichier texte de la session côté serveur.
    session_destroy();

    // envoi du booléen
    return true;
}