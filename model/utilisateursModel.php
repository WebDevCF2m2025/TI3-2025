<?php

# Connexion de l'administrateur en utilisant password_verify
function authentificateAdminUser(PDO $pdo, string $login, string $password): array|false
{
    // Nettoyage des champs
    $login = trim(strip_tags($login));
    $password = trim(strip_tags($password));

    // Vérifie s’il manque un champ
    if ($login === '' || $password === '') {
        return false;
    }

    // On essaye la requete
    try {
        $sql = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login]);

        $user = $stmt->fetch();

        // Si le mot de passe est correct et existe on retourne le tableau
        if (
            $user &&
            isset($user['passwd']) &&
            password_verify($password, $user['passwd'])
        ) {
            return $user;
        }

        // Retourne false par défaut
        return false;
    } catch (PDOException $e) {
        return false;
    }
}



# Déconnexion de l'administrateur
function logoutAdminUser(): void
{
    // Efface toutes les variables de session
    $_SESSION = [];
    // Supprime le cookie de session s'il existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Détruit la session
    session_destroy();

    // Redirection vers la page d’accueil
    header("Location: ./");
    exit();
}
