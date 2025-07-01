<?php
# model/ArticleModel.php



/**
 * Sélection pour l'administration
 * @param PDO $connexion
 * @return array
 */
function selectAllLocalisation(PDO $connexion): array
{
    $sql = "
    SELECT *
    FROM `localisations` 
    
       
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
 * On récupère l'article pour l'update (avec son user de base))
 * @param PDO $connexion
 * @param int $idarticle
 * @return array|bool
 */
function selectOneLocalisationById(PDO $connexion, int $id): array|bool
{
    $sql = " SELECT *
    FROM `localisations`  
     WHERE `id`= ?";
    $prepare = $connexion->prepare($sql);

    try{
        // on récupère 1 ou 0 article
       $prepare->execute([$id]);
       if($prepare->rowCount()===0) return false;
       // on a trouvé un article
       $recup = $prepare->fetch();
       $prepare->closeCursor();
       return $recup;

    }catch(Exception $e){
        die($e->getMessage());
    }
}

function updateLocalisationById(PDO $connection, array $datas, int $id){
    // on vérifie que la personne n'essaye pas d'accéder à un autre article
    
    // préparation de la requête
 $sql = "UPDATE `localisations` SET `nom`= :nom,
                   `adresse`= :adresse,
                   `codepostal` = :codepostal,
                   `ville` = :ville,
                   `latitude` = :latitude,
                   `longitude` = :longitude
                   WHERE `id`= :id";


    // On va traiter nos variables post avant une éventuelle mise à jour

// on va encoder le nom
    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])),ENT_QUOTES);
// on va encoder lea adresse 
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])),ENT_QUOTES);
    // on va encoder le latitude
   $codepostal = (int) trim($datas['codepostal']);
    // on va encoder lea ville 
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])),ENT_QUOTES);
// on va encoder le latitude
   $latitude = (float) trim($datas['latitude']);
// on va encoder lea longitude 
 $longitude = (float) trim($datas['longitude']);

    if (
        empty($nom) ||
        empty($adresse) ||
        empty($ville) ||
        empty($codepostal) ||
        strlen($nom) > 100 ||
        strlen($adresse) > 100 ||
        empty($latitude) ||
        empty($longitude)) return false;



$prepare = $connection->prepare($sql);

try{
    $prepare->bindValue("nom", $nom);
    $prepare->bindValue("adresse", $adresse);
  $prepare->bindValue("codepostal", $codepostal);
    $prepare->bindValue("ville", $ville);
    $prepare->bindValue("latitude", $latitude);
    $prepare->bindValue("longitude", $longitude);
    $prepare->bindValue("id", $id); // <-- AJOUT OBLIGATOIRE

    $prepare->execute();
    return true;

}catch(Exception $e){
    die($e->getMessage());
}

}

/**
 * Supprime un article
 * @param PDO $connexion
 * @param int $id
 * @return bool
 */
function deleteLocalisation(PDO $connexion, int $id): bool
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

/**
 * @param PDO $con
 * @param array $datas
 * @return bool
 * @throws \Random\RandomException
 */
function insertlocalisation(PDO $con, array $datas): bool
{
   
// on va encoder le nom
    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])),ENT_QUOTES);
// on va encoder lea adresse 
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])),ENT_QUOTES);
    // on va encoder le latitude
   $codepostal = (int) trim($datas['codepostal']);
    // on va encoder lea ville 
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])),ENT_QUOTES);
// on va encoder le latitude
   $latitude = (float) trim($datas['latitude']);
// on va encoder lea longitude 
 $longitude = (float) trim($datas['longitude']);

    if (
        empty($nom) ||
        empty($adresse) ||
        empty($ville) ||
        empty($codepostal) ||
        strlen($nom) > 100 ||
        strlen($adresse) > 100 ||
        empty($latitude) ||
        empty($longitude)) return false;



$sql = "INSERT INTO localisations (nom, adresse, codepostal, ville ,latitude, longitude) VALUES (?, ?, ?, ?,?,?)";
$prepare = $con->prepare($sql);

try {
    $prepare->execute([$nom, $adresse,$codepostal,$ville ,$latitude, $longitude]);
    return true;
} catch (Exception $e) {
    die($e->getMessage());
}

}
