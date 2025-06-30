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


/**
 * @param PDO $con
 * @param array $datas
 * @return bool
 * @throws \Random\RandomException
 */
function insertLocalisations(PDO $con, array $datas): bool
{


    // on va encoder le nom
    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])), ENT_QUOTES);
    // on va encoder le adresse
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])), ENT_QUOTES);
    // on va encoder le codepostal
    $codepostal = htmlspecialchars(trim(strip_tags($datas['codepostal'])), ENT_QUOTES);
    // on va encoder le adresse
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])), ENT_QUOTES);
    // on va encoder le latitude
    $latitude = htmlspecialchars(trim(strip_tags($datas['latitude'])), ENT_QUOTES);
    // on va encoder le longitude
    $longitude = htmlspecialchars(trim(strip_tags($datas['longitude'])), ENT_QUOTES);



    if (empty($nom) || strlen($nom) > 50 ||  empty($adresse) || strlen($adresse) > 50 ||  empty($codepostal) || strlen($codepostal) > 4 ||  empty($ville) || strlen($ville) > 20 ||  empty($latitude) || strlen($latitude) > 50 ||  empty($longitude) || strlen($longitude) > 50) return false;

   

    $sql = "INSERT INTO `localisations` (`nom`,
                       `adresse`,
                       `codepostal`,
                       `ville`,
                       `latitude`,
                       `longitude`) VALUES (?,?,?,?,?,?)";

    $prepare = $con->prepare($sql);

    try {

        $prepare->execute([
            $nom,
            $adresse,
            $codepostal,
            $ville,
            $latitude,
            $longitude

        ]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/**
 * Supprime un article
 * @param PDO $connexion
 * @param int $id
 * @return bool
 */
function deleteLocalisations(PDO $connexion, int $id): bool
{
    // requête préparée
    $sql = "DELETE FROM `localisations` WHERE `id`=?";
    $prepare = $connexion->prepare($sql);
    try {
        $prepare->execute([$id]);
        $prepare->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}