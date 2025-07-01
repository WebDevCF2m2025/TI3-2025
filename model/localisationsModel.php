<?php
function selectAllLocalisation(PDO $connect): array

{
    $sql =
        "
        SELECT * FROM `localisations`;
    ;
    ";

    try {
        $query = $connect->query($sql);
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

function selectOneLocalisatoinById(PDO $connect, int $idLocalisation): array | bool

{
    $sql = "SELECT * FROM `localisations` WHERE `id` = ?";

    $prepare = $connect->prepare($sql);


    try {
        $prepare->execute([$idLocalisation]);

        if ($prepare->rowCount() === 0) return false;

        $result = $prepare->fetch();

        $prepare->closeCursor();
        return $result;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}




function updateLocalisationById(PDO $connection, array $datas, int $idLocalisation): bool
{

    if ($datas['idLocalisation'] != $idLocalisation) die("Attaque !");

    $sql = "UPDATE `localisations` SET `nom`= :nom,
                       `adresse`= :adresse,
                       `numero` = :numero,
                       `ville` = :ville,
                       `codepostal` = :codepostal,
                       `latitude` = :latitude,
                       `longitude` = :longitude
                       WHERE `id`= :id";

    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])), ENT_QUOTES);

    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])), ENT_QUOTES);

    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])), ENT_QUOTES);


    if (
        empty($nom) ||
        empty($adresse) ||
        empty($ville) ||
        strlen($nom) > 30 ||
        strlen($adresse) > 100 ||
        strlen($ville) > 20
    ) return false;

    // on va encoder le text
    $idLocalisation = htmlspecialchars(trim(strip_tags($datas['idLocalisation'])), ENT_QUOTES);
    $numero = htmlspecialchars(trim(strip_tags($datas['numero'])), ENT_QUOTES);
    $codepostal = htmlspecialchars(trim(strip_tags($datas['codepostal'])), ENT_QUOTES);

    $latitude = htmlspecialchars(trim(strip_tags($datas['latitude'])), ENT_QUOTES);
    $longitude = htmlspecialchars(trim(strip_tags($datas['longitude'])), ENT_QUOTES);



    if (
        empty($numero) ||
        empty($codepostal) ||
        empty($latitude) ||
        empty($longitude) ||
        strlen($numero) > 10 ||
        strlen($codepostal) > 4
    ) return false;


    $prepare = $connection->prepare($sql);

    try {
        $prepare->bindValue("id", (int) $idLocalisation, PDO::PARAM_INT);
        $prepare->bindValue("nom", $nom);
        $prepare->bindValue("adresse", $adresse);
        $prepare->bindValue("numero", $numero);
        $prepare->bindValue("ville", $ville);
        $prepare->bindValue("codepostal", $codepostal);
        $prepare->bindValue("latitude", (float) $latitude);
        $prepare->bindValue("longitude", (float) $longitude);

        $prepare->execute();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}




function insertLocalisation(PDO $con, array $datas): bool
{

    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])), ENT_QUOTES);
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])), ENT_QUOTES);
    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])), ENT_QUOTES);


    $numero = htmlspecialchars(trim(strip_tags($datas['numero'])), ENT_QUOTES);
    $codepostal = htmlspecialchars(trim(strip_tags($datas['codepostal'])), ENT_QUOTES);
    $latitude = htmlspecialchars(trim(strip_tags($datas['latitude'])), ENT_QUOTES);
    $longitude = htmlspecialchars(trim(strip_tags($datas['longitude'])), ENT_QUOTES);


    if (
        empty($nom) ||
        empty($adresse) ||
        empty($ville) ||
        strlen($nom) > 30 ||
        strlen($adresse) > 100 ||
        strlen($ville) > 20
    ) return false;

    if (
        empty($numero) ||
        empty($codepostal) ||
        empty($latitude) ||
        empty($longitude) ||
        strlen($numero) > 10 ||
        strlen($codepostal) > 4
    ) return false;




    $sql = "INSERT INTO `localisations` (`nom`,
                       `adresse`,
                       `numero`,
                       `ville`,
                       `codepostal`,
                       `latitude`,
                       `longitude`) VALUES (?,?,?,?,?,?,?)";

    $prepare = $con->prepare($sql);

    try {

        $prepare->execute([
            $nom,
            $adresse,
            $numero,
            $ville,
            $codepostal,
            (float) $latitude,
            (float)$longitude
        ]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}






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
