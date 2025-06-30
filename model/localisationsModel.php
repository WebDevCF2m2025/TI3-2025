<?php

/**
 * @param PDO $connexion
 * @return array
 * Sélection de tous location
 * 
 */

 function selectAllLocalisation(PDO $connexion): array | bool
{
    $sql = "SELECT * FROM `localisations`";
    $prepare = $connexion->prepare($sql);

    try{
        $prepare->execute();
       $recup = $prepare->fetchAll();
       $prepare->closeCursor();
       return $recup;

    }catch(Exception $e){
        die($e->getMessage());
    }
}

function SelectLocalisationById(PDO $connexion, int $id): array | bool
{
    $sql = "SELECT * FROM `localisations` WHERE `id` = :id";
    $prepare = $connexion->prepare($sql);

    try {
        $prepare->execute(['id' => $id]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        $prepare->closeCursor();
        return $result;
    } catch (Exception $e) {
        die("Erreur lors de la récupération de la localisation : " . $e->getMessage());
    }
}





function updateLocalisationById(PDO $connection, array $datas, int $idarticle): bool
{
    // Vérifie que l'ID transmis correspond à celui de l'article
    if (!isset($datas['id']) || $datas['id'] != $idarticle) {
        die("Tentative de modification non autorisée !");
    }

    // Préparation de la requête sans mettre à jour la colonne id
    $sql = "UPDATE `localisations` 
            SET `rue` = :rue,
                `codepostal` = :codepostal,
                `ville` = :ville,
                `latitude` = :latitude,
                `longitude` = :longitude
            WHERE `id` = :id";

    $prepare = $connection->prepare($sql);

    try {
        $success = $prepare->execute([
            ':rue'       => $datas['rue'],
            ':codepostal'=> $datas['codepostal'],
            ':ville'     => $datas['ville'],
            ':latitude'  => $datas['latitude'],
            ':longitude' => $datas['longitude'],
            ':id'        => $idarticle
        ]);
        $prepare->closeCursor();
        return $success;
    } catch (Exception $e) {
        die("Erreur lors de la mise à jour : " . $e->getMessage());
    }
}


function createLocalisation(PDO $connexion, array $datas): bool
{
    // Vérification minimale des données requises
    $requiredFields = ['rue', 'codepostal', 'ville', 'latitude', 'longitude'];
    foreach ($requiredFields as $field) {
        if (!isset($datas[$field])) {
            die("Champ requis manquant : $field");
        }
    }

    $sql = "INSERT INTO `localisations` (`rue`, `codepostal`, `ville`, `latitude`, `longitude`)
            VALUES (:rue, :codepostal, :ville, :latitude, :longitude)";
    
    $prepare = $connexion->prepare($sql);

    try {
        $success = $prepare->execute([
            ':rue'        => $datas['rue'],
            ':codepostal' => $datas['codepostal'],
            ':ville'      => $datas['ville'],
            ':latitude'   => $datas['latitude'],
            ':longitude'  => $datas['longitude']
        ]);
        $prepare->closeCursor();
        return $success;
    } catch (Exception $e) {
        die("Erreur lors de l'insertion : " . $e->getMessage());
    }
}


function deleteLocalisationById(PDO $connexion, int $id): bool
{
    $sql = "DELETE FROM `localisations` WHERE `id` = :id";
    $prepare = $connexion->prepare($sql);

    try {
        $success = $prepare->execute([':id' => $id]);
        $prepare->closeCursor();
        return $success;
    } catch (Exception $e) {
        die("Erreur lors de la suppression : " . $e->getMessage());
    }
}