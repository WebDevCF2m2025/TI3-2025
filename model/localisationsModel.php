<?php



// Sélection de toutes les données


function countMarkers(PDO $db): int
{
  $request = $db->query("SELECT COUNT(*) AS total FROM localisations");
  try {
    $request->execute();
    $result = $request->fetch();
    $request->closeCursor();
    return (int)$result['total'];
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

function getMarkerPagination(PDO$db, int $offset, int $limit): array
{
  $sql = "SELECT m.`id`, m.`nom`, m.`adresse`, m.`codepostal`, m.`ville`,m.`nb_velos`, m.`latitude`, m.`longitude`
          FROM localisations m 
          ORDER BY `id` ASC
          LIMIT ?, ?";

  $request = $db->prepare($sql);

  $request->bindParam(1,$offset,PDO::PARAM_INT);
  $request->bindParam(2,$limit,PDO::PARAM_INT);

  try {
    $request->execute();
    $results = $request->fetchAll();
    $request->closeCursor();
    return $results;
  } catch (Exception $e) {
    die($e->getMessage());
  }
}

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

function updateMarkerById(PDO $db,$id,$nom, $adresse, $codepostal, $ville, $nb_velos, $latitude, $longitude): bool|string
{
  // Sécurisation des données utilisateurs
  $nom = htmlspecialchars(strip_tags(trim($nom)), ENT_QUOTES);
  $adresse = htmlspecialchars(strip_tags(trim($adresse)), ENT_QUOTES);
  $codepostal = htmlspecialchars(strip_tags(trim($codepostal)), ENT_QUOTES);
  $ville = htmlspecialchars(strip_tags(trim($ville)), ENT_QUOTES);
  $nb_velos = (int) $nb_velos;
  $latitude = (float) $latitude;
  $longitude = (float) $longitude;
  // Vérification des champs
  if(empty($nom) || empty($adresse) || empty($codepostal) || empty($ville) || empty($latitude) ||
    empty($longitude)) {
    return "a";
  }
  if (strlen($nom) > 30 || strlen($adresse) > 100 || strlen($ville) > 20 || strlen($codepostal) > 4) {
    return "b";
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


  $request = $db->prepare($sql);

  try{
    $request->execute(
      [
        $nom,
        $adresse,
        $codepostal,
        $ville,
        $nb_velos,
        $latitude,
        $longitude,
        $id
      ]
    );
    $request->closeCursor();
    return true;
  }catch (Exception $e){
    die($e->getMessage());
  }

}

function getOneMarkerById(PDO $db, int $id): array|bool
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
// Ajouter un marqueur
function addMarker(PDO $db, array $datas): bool
{
  // verification des champs
  $nom = $datas['nom'];
  $adresse = $datas['adresse'];
  $codepostal = $datas['codepostal'];
  $ville = $datas['ville'];
  $nb_velos = $datas['nb_velos'];
  $latitude = $datas['latitude'];
  $longitude = $datas['longitude'];

  if(empty($nom) || empty($adresse) || empty($codepostal) || empty($ville) || empty($nb_velos) || empty($latitude) ||
    empty($longitude)) {
    return false;
  } elseif (strlen($nom) > 30 || strlen($adresse) > 100 || strlen($ville) > 20 || strlen($codepostal) > 4) {
    return false;
  }

  $sql = "INSERT INTO localisations (`nom`, `adresse`, `codepostal`, `ville`, `nb_velos`, `latitude`, `longitude`)
          VALUES (?, ?, ?, ?, ?, ?, ?)";

  $prepare = $db->prepare($sql);

  try{
    $prepare->execute([$nom, $adresse, $codepostal, $ville, $nb_velos, $latitude, $longitude]);
    $prepare->closeCursor();
    return true;
  }catch (Exception $e){
    die($e->getMessage());
  }
}

function pagination(int $totalMarker,string $get="pg",int $pageActu=1,int $perPage =5)
{
  $output = "";

  if($totalMarker ===0)return "";

  $nbPages = ceil($totalMarker / $perPage);

  if($nbPages==1) return "";

  $output .= "<p>";

  for($i=1;$i<=$nbPages;$i++){
    if($i === 1){
      if ($i === 1){
        $output .= "<< < 1";
      }elseif ($i === 2) {
        $output .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
      } else {
        $output .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
      }
    } elseif($i < $nbPages) {
      if($i === $pageActu) {
        $output .= "  $i |";
      }else{
        $output .= "  <a href='?$get=$i'>$i</a> |";
      }


    }else {
      if($pageActu >= $nbPages){
        $output .= "$nbPages > >>";
      }else{
        $output .=   "<a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
      }

    }
  }

  $output .= "</p>";
  return $output;

}
