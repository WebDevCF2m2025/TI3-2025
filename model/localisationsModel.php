<?php


//function getLocalisations(PDO $connect): array
//    $request = $connect->prepare("SELECT * FROM localisations" );
 


function getLocalisationsPublished(PDO $connect): array
{
    $request = $connect->prepare("SELECT * FROM `localisations`");
    try {
        $request->execute();
        $results = $request->fetchAll();
        $request->closeCursor();
        return $results;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function getAllLocalisations(PDO $connect): array
{
    $request = $connect->prepare("SELECT * FROM `localisations` l  
        INNER JOIN `utilisateurs` u 
            ON l.`idutilisateurs`= u.`idutilisateurs`
    ORDER BY l.`localisationspublished` ASC,
             l.`localisationsdatepublished` DESC ;
");

    try {
        $request->execute();
        $results = $request->fetchAll();
        $request->closeCursor();
        return $results;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

function deleteMarkerById(PDO $connect, int $id): bool
{
    $sql = "DELETE FROM `localisations` WHERE `id`=?";
    $request = $connect->prepare($sql);
    try {
        $request->execute([$id]);
        $request->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


// UPDATE 

function updateAdresseById(PDO $connect, array $datas): bool
{
    // encodage du texte
    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])));
    if (empty($nom) || strlen($nom) > 200) return false;
 
        // encodage du texte
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])));
    if (empty($adresse) || strlen($adresse) > 200) return false;
 
    $latitude = (float)$datas['latitude'];
    if (empty($latitude) ) return false;
 
    $longitude = (float)$datas['longitude'];
    if (empty($longitude) ) return false;
    
    $idAdresse = (int)$_GET['id'];
    if (empty($idAdresse)) return false;
  
 
    $sql = "UPDATE `localisations` SET `nom` = ?, `adresse` = ?, `latitude` = ?, `longitude` = ? where `id` = ?;";
 
    $prepare = $connect->prepare($sql);
 
    try {
        $prepare->execute([
            $nom,
            $adresse,
            $latitude,
            $longitude,
            $idAdresse
           
 
        
        ]);
        $prepare->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
 
 
}

