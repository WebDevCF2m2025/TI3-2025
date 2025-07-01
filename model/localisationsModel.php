<?php
echo "_lm";

# model/ArticleModel.php
/*
 * CRUD
 */

/*
 * CREATE
 */

// Insertion d'un article en base de donnée

function addAdresse(PDO $connect, array $datas): bool
{
    // on va vérifier si l'article est bien écrit par l'utilisateur
    // connecté


    // encodage du texte
    $nom = htmlspecialchars(trim(strip_tags($datas['nom'])));
    if (empty($nom) || strlen($nom) > 200) return false;

        // encodage du texte
    $adresse = htmlspecialchars(trim(strip_tags($datas['adresse'])));
    if (empty($adresse) || strlen($adresse) > 200) return false;

    $codepostal = (int)$datas['codepostal'];
    if (empty($codepostal) || $codepostal > 9000) return false;

    $ville = htmlspecialchars(trim(strip_tags($datas['ville'])));
    if (empty($ville) || strlen($ville) > 100) return false;

    $latitude = (float)$datas['latitude'];
    if (empty($latitude) ) return false;

    $longitude = (float)$datas['longitude'];
    if (empty($longitude) ) return false;




    $sql = "INSERT INTO `localisations` (`nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES (:nom, :adresse, :codepostal, :ville, :latitude, :longitude);";

    $prepare = $connect->prepare($sql);

    try {
        $prepare->execute([
            "nom" => $nom,
            "adresse" => $adresse,
            "codepostal" => $codepostal,
            "ville" => $ville,
            "latitude" => $latitude,
            "longitude" => $longitude,
        ]);
        $prepare->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }

}

/*
 * READ
 */

/**
 * @param PDO $connect
 * @return array
 * Récupère les articles publiés sur la
 * page d'accueil par date de publication descendante
 * Pas d'affichage des articles plus tard que la date actuelle
 */
function getListPublished(PDO $connect): array
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



/**
 * @param PDO $connect
 * @param int $id
 * @return array|bool
 * On récupère un article via son ID pour la modification
 */
function getOneArticleById(PDO $connect, int $id): array|bool
{
    // requête préparée obligatoire, ca entrée utilisateur
    $request = $connect->prepare("
    SELECT a.`idarticle`, a.`title`, a.`slug`, a.`articletext`, a.`articlepublished`, a.`articledatepublished`, u.`iduser`, u.`login`, u.`username`
    FROM `article` a 
        INNER JOIN `user` u 
            ON a.`user_iduser`= u.`iduser`
    WHERE a.`idarticle` = ?
");
    try {
        $request->execute([$id]);
        // pas d'articles
        if ($request->rowCount() === 0) return false;
        $results = $request->fetch();
        $request->closeCursor();
        // 1 article au format FETCH_ASSOC
        return $results;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

/*
 * UPDATE
 */

function updateArticleById(PDO $connect, array $datas): bool
{


    // protection des variables
    // vérification du titre
    $title = htmlspecialchars(trim(strip_tags($datas['title'])));

    if (empty($title) || strlen($title) > 160) return false;

    // vérification du slug
    $slug = htmlspecialchars(trim(strip_tags($datas['slug'])));

    if (empty($slug) || strlen($slug) > 165) return false;


    // encodage du texte
    $text = htmlspecialchars(trim(strip_tags($datas['articletext'])));

    if (empty($text) || strlen($text) > 65000) return false;

    // si on a coché 'articlepublished'
    if (isset($datas['articlepublished'])) {
        $isPublished = 1;
        $datePublished = empty($datas['articledatepublished']) ? date("Y-m-d H:i:s") : $datas['articledatepublished'];
    } else {
        $isPublished = 0;
        $datePublished = null;
    }

    $iduser = (int) $datas['user_iduser'];

    if(empty($iduser)) return false;

    $idarticle = (int) $datas['idarticle'];

    if(empty($idarticle)) return false;

    $sql = "UPDATE `article` SET 
                 `title` = ?,
                 `slug` = ?,
                 `articletext` = ?,
                 `articlepublished`= ?,
                 `articledatepublished`=?,
                 `user_iduser`=?
            WHERE `idarticle` = ?
                     ";

    $prepare = $connect->prepare($sql);

    try{

        $prepare->execute(
            [
                $title,
                $slug,
                $text,
                $isPublished,
                $datePublished,
                $iduser,
                $idarticle,
            ]
        );
        $prepare->closeCursor();
        return true;

    }catch (Exception $e){
        die($e->getMessage());
    }

}

/*
 * DELETE
 */

/**
 * @param PDO $connect
 * @param int $id
 * @return bool
 * Suppression d'un article via son id
 */
function deleteArticleById(PDO $connect, int $id): bool
{
    $sql = "DELETE FROM `article` WHERE `idarticle`=?";
    $request = $connect->prepare($sql);
    try {
        $request->execute([$id]);
        $request->closeCursor();
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


/**
 * Création d'un slug unique à partir d'un titre
 * @param string $string
 * @return string
 * @throws \Random\RandomException
 */
function createSlug(string $string): string
{
    // Convertir en minuscules
    $string = strtolower($string);

    // Supprimer les accents
    $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);

    // Remplacer tout ce qui n'est pas alphanumérique par un tiret
    $string = preg_replace('/[^a-z0-9]+/', '-', $string);

    // Supprimer les tirets en début et fin de chaîne
    $string = trim($string, '-');

    // choisir au hasard 2 bytes (octets) et les transformer en
    // hexadécimal
    $hasard = bin2hex(random_bytes(2));

    return $hasard . "-" . $string;
}

/**
 * Date en français
 * @param string $datetime
 * @return string
 */
function dateFR(string $datetime): string
{
    // Temps unix en seconde de la date venant de la db
    $stringtotime = strtotime($datetime);

    // Retour de la date au format
    return date("d/m/Y \à H\hi", $stringtotime);
}

/**
 * Evite de couper un texte au milieu
 * d'un mot
 * @param string $text
 * @return string
 *
 */
function cutTheText(string $text): string
{
    // on récupère la position du dernier espace dans le texte
    $lastSpace = strripos($text, " ");
    // on coupe le texte de 0 à la position de l'espace vide
    return substr($text, 0, $lastSpace) . "...";
}