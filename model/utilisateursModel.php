<?php

# Connexion de l'administrateur en utilisant password_verify
function authentificateAdminUser(PDO $pdo, string $login, string $password): array|false {
    $sql = "SELECT * FROM utilisateurs WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$login]);

    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['passwd'])) {
        return $user;
    }

    return false;
}
# Déconnexion de l'administrateur