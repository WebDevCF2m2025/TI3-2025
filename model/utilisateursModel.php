<?php
# TI3-2025/model/utilisateursModel.php

# Connexion de l'administrateur en utilisant password_verify

function connectUtilisateur(PDO $con, string $username, string $passwd): bool
{
    $username = trim($username);
    $passwd = trim($passwd);

    $request = $con->prepare("SELECT * FROM `utilisateurs` WHERE `username` = ?");
    try {
        $request->execute([$username]);

        if ($request->rowCount() === 0) {
            return false;
        }

        $result = $request->fetch();
        $request->closeCursor();

        if (password_verify($passwd, $result['passwd'])) {
            $_SESSION = $result;
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

function disconnectUtilisateur(): bool
{
    session_unset();

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

    session_destroy();

    return true;
}

function updateUserById(PDO $connect, array $datas): bool
{
    $id = (int)$datas['id'];
    $nom = trim(strip_tags($datas['username']));
    $pass = trim(strip_tags($datas['passwd']));

    if (empty($id) || empty($nom) || empty($pass)) {
        return false;
    }

    $sql = "UPDATE `utilisateurs` SET `username` = ?, `passwd` = ? WHERE `id` = ?";
    $prepare = $connect->prepare($sql);

    try {
        $prepare->execute([$nom, $pass, $id]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
