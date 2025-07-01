<?php



// Sélection de toutes les données
function getAllMarkers(PDO $db): array {

  $request = $db->query("SELECT m.`id`, m.`nom`, m.`adresse`, m.`codepostal`, m.`ville`,m.`nb_velos`, m.`latitude`, m.`longitude`
  FROM localisations m 
  ");

  try{
    $request->execute();
    $results = $request->fetchAll();
    $request->closeCursor();
    return $results;

  }catch (Exception $e ){
    die($e->getMessage());
  }
}

$markers = getAllMarkers($db);

// Supprimer un marqueur
function deleteMarkerById(PDO $db, int $id): bool {
  $sql = "DELETE FROM localisations WHERE `id` = ?";
  $request = $db->prepare($sql);
  try{
    $request->execute([$id]);
    $request->closeCursor();
    return true;
  }catch (Exception $e){
    die($e->getMessage());
  }
}

// Modifier un marqueur/ information

function updateMarkerById(PDO $db, array $datas): bool
{
  // verification des champs
  $nom = trim($datas['nom']);
  $adresse = trim($datas['adresse']);
  $codepostal = trim($datas['codepostal']);
  $ville = trim($datas['ville']);
  $nb_velos = trim($datas['nb_velos']);
  $latitude = trim($datas['latitude']);
  $longitude = trim($datas['longitude']);
  $id = (int)$datas['id'];


  if(empty($nom) || empty($adresse) || empty($codepostal) || empty($ville) || empty($nb_velos) || empty($latitude) ||
    empty($longitude) || empty($id)) {
    return false;
  } elseif (strlen($nom) > 30 || strlen($adresse) > 100 || strlen($ville) > 20 || strlen($codepostal) > 4)  {
    return false;
  }

  $sql = "UPDATE localisations SET
                        `nom` = ?, 
                        `adresse` = ?, 
                        `codepostal` = ?, 
                        `ville` = ?, 
                        `nb_velos` = ?, 
                        `latitude` = ?, 
                        `longitude` = ? 
                    WHERE `id` = ?";


  $prepare = $db->prepare($sql);

  try{
    $prepare->execute([$nom, $adresse, $codepostal, $ville, $nb_velos, $latitude, $longitude, $id]);
    $prepare->closeCursor();
    return true;
  }catch (Exception $e){
    die($e->getMessage());
  }

}

function getOneMarkerById(PDO $db, int $id): array|false
{
  $sql = "SELECT * FROM localisations WHERE `id` = ?";
  $request = $db->prepare($sql);
  try{
    $request->execute([$id]);
    if($request->rowCount() === 0) return false;
    $result = $request->fetch();
    $request->closeCursor();
    return $result;
  }catch (Exception $e){
    die($e->getMessage());
  }
}

