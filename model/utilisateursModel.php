<?php

# Connexion de l'administrateur en utilisant password_verify
function authentificateAdminUser(PDO $pdo, string $login, string $password): array|false
{
    try {
        $sql = "SELECT * FROM utilisateurs WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login]);

        $user = $stmt->fetch();

        if (
            $user &&
            isset($user['passwd']) &&
            password_verify($password, $user['passwd'])
        ) {
            return $user;
        }

        return false;
    } catch (PDOException $e) {
        return false;
    }
}

# Déconnexion de l'administrateur
function logoutAdminUser(): void {
    // Efface toutes les variables de session
    $_SESSION = [];

    // Supprime le cookie de session s'il existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Détruit la session
    session_destroy();

    // Redirection vers la page d’accueil ou autre
    header("Location: ./");
    exit();
}
