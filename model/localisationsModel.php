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
    $sql = " SELECT * FROM `localisations`  
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
$sql = "UPDATE `localisations` SET `rue`= :rue,
                   `codepostal`= :codepostal,
                   `ville`= :ville,
                   `latitude` = :latitude,
                   `longitude` = :longitude
                   WHERE `id`= :id";


    // On va traiter nos variables post avant une éventuelle mise à jour

// on va encoder la rue
    $rue = htmlspecialchars(trim(strip_tags($datas['rue'])),ENT_QUOTES);
// on va encoder l' adresse 
    $codepostal = htmlspecialchars(trim(strip_tags($datas['codepostal'])),ENT_QUOTES);
    // on va encoder la ville
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])),ENT_QUOTES);

// on va encoder le latitude
   $latitude = (float) trim($datas['latitude']);
// on va encoder lea longitude 
 $longitude = (float) trim($datas['longitude']);

   if (
    empty($rue) ||
    empty($codepostal) ||
    empty($ville) ||
    empty($latitude) ||
    empty($longitude)
) return false;



$prepare = $connection->prepare($sql);

try{
$prepare->bindValue(":rue", $rue);
$prepare->bindValue(":codepostal", $codepostal);
$prepare->bindValue(":ville", $ville);
$prepare->bindValue(":latitude", $latitude);
$prepare->bindValue(":longitude", $longitude);
$prepare->bindValue(":id", $id, PDO::PARAM_INT);


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
    $rue = htmlspecialchars(trim(strip_tags($datas['rue'])),ENT_QUOTES);
// on va encoder lea adresse 
    $codepostal = htmlspecialchars(trim(strip_tags($datas['codepostal'])),ENT_QUOTES);
    // on va encoder la ville
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])),ENT_QUOTES);
// on va encoder le latitude
   $latitude = (float) trim($datas['latitude']);
// on va encoder lea longitude 
 $longitude = (float) trim($datas['longitude']);

    if (
        empty($rue) ||
        empty($codepostal) ||
        // strlen($nom) > 100 ||
        // strlen($adresse) > 100 ||
        empty($ville) ||
        empty($latitude) ||
        empty($longitude)) return false;



$sql = "INSERT INTO localisations (rue, codepostal, ville, latitude, longitude) VALUES (?, ?, ?, ?, ?)";
$prepare = $con->prepare($sql);

try {
    $prepare->execute([$rue, $codepostal, $ville, $latitude, $longitude]);
    return true;
} catch (Exception $e) {
    die($e->getMessage());
}

}

