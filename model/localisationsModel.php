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
       $recup = $prepare->fetchAll();
       $prepare->closeCursor();
       return $recup;

    }catch(Exception $e){
        die($e->getMessage());
    }
}

function selectLocalisationById(PDO $connexion, int $id): array | bool
{
    $sql = "SELECT * FROM `localisations` WHERE `id` = :id";
    $prepare = $connexion->prepare($sql);

    try {
        $prepare->execute([':id' => $id]);
        $result = $prepare->fetch(PDO::FETCH_ASSOC);
        $prepare->closeCursor();
        return $result;
    } catch (Exception $e) {
        die("Erreur lors de la récupération de la localisation : " . $e->getMessage());
    }
}



