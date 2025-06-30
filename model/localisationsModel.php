<?php
/**
 * Sélection pour l'administration
 * @param PDO $connexion
 * @return array
 */
function selectAllLocalisations(PDO $connexion): array
{
    $sql = "
    SELECT l.`id`, l.`nom` , l.`adresse` , l.`codepostal` , l.`ville` , l.`latitude` , l.`longitude`
    FROM `localisations` l 

    ;
    ";
    try {
        // requête
        $query = $connexion->query($sql);
        // récupération des résultats (tableau indexé, si 0 => [])
        $resultat = $query->fetchAll();
        // bonne pratique
        $query->closeCursor();
        // envoyer le résultat
        return $resultat;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
