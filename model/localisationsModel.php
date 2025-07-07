<?php
# TI3-2025/model/localisationsModel.php

function addLocalisation(PDO $connect, array $datas): bool
{
    $nom = trim(strip_tags($datas['nom']));
    $adresse = trim(strip_tags($datas['adresse']));
    $codepostal = trim(strip_tags($datas['codepostal']));
    $ville = trim(strip_tags($datas['ville']));
    $latitude = filter_var($datas['latitude'], FILTER_VALIDATE_FLOAT);
    $longitude = filter_var($datas['longitude'], FILTER_VALIDATE_FLOAT);

    if (empty($nom) || empty($adresse) || empty($codepostal) || empty($ville) || $latitude === false || $longitude === false) {
        return false;
    }

    $sql = "INSERT INTO `localisations` (`nom`, `adresse`, `codepostal`, `ville`, `latitude`, `longitude`) VALUES (:nom, :adresse, :codepostal, :ville, :latitude, :longitude)";
    $prepare = $connect->prepare($sql);

    try {
        $prepare->execute([
            "nom" => $nom,
            "adresse" => $adresse,
            "codepostal" => $codepostal,
            "ville" => $ville,
            "latitude" => $latitude,
            "longitude" => $longitude
        ]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function getAllLocalisations(PDO $connect): array
{
    $request = $connect->prepare("SELECT * FROM `localisations` ORDER BY `id` DESC");
    try {
        $request->execute();
        $results = $request->fetchAll();
        return $results;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function getLocalisationById(PDO $connect, int $id): array|bool
{
    $request = $connect->prepare("SELECT * FROM `localisations` WHERE `id` = ?");
    try {
        $request->execute([$id]);
        if ($request->rowCount() === 0) return false;
        $result = $request->fetch();
        return $result;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function updateLocalisationById(PDO $connect, array $datas): bool
{
    $id = (int)$datas['id'];
    $nom = trim(strip_tags($datas['nom']));
    $adresse = trim(strip_tags($datas['adresse']));
    $codepostal = trim(strip_tags($datas['codepostal']));
    $ville = trim(strip_tags($datas['ville']));
    $latitude = filter_var($datas['latitude'], FILTER_VALIDATE_FLOAT);
    $longitude = filter_var($datas['longitude'], FILTER_VALIDATE_FLOAT);

    if (empty($id) || empty($nom) || empty($adresse) || empty($codepostal) || empty($ville) || $latitude === false || $longitude === false) {
        return false;
    }

    $sql = "UPDATE `localisations` SET `nom` = ?, `adresse` = ?, `codepostal` = ?, `ville` = ?, `latitude` = ?, `longitude` = ? WHERE `id` = ?";
    $prepare = $connect->prepare($sql);

    try {
        $prepare->execute([$nom, $adresse, $codepostal, $ville, $latitude, $longitude, $id]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}


function deleteLocalisationById(PDO $connect, int $id): bool
{
    $sql = "DELETE FROM `localisations` WHERE `id` = ?";
    $request = $connect->prepare($sql);

    try {
        $request->execute([$id]);
        return true;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

#function cutTheText(string $text, int $maxLength = 50): string
#{
#    // Vérifie si le texte est plus long que la longueur maximale
#    if (strlen($text) <= $maxLength) {
#        return $text;
#    }

#    // Trouve la position du dernier espace avant la limite de longueur
#    $lastSpace = strripos(substr($text, 0, $maxLength), ' ');

#    // Si aucun espace n'est trouvé, coupe simplement au $maxLength
#    if ($lastSpace === false) {
#        return substr($text, 0, $maxLength) . "...";
#    }

#    // Coupe le texte à la position du dernier espace et ajoute "..."
#    return substr($text, 0, $lastSpace) . "...";
#}

#function cutTheText(string $text): string
#{
#    // on récupère la position du dernier espace dans le texte
#    $lastSpace = strripos($text, " ");
#    // on coupe le texte de 0 à la position de l'espace vide
#    return substr($text, 0, $lastSpace) . "...";
#}

function getlocalisationPagination(PDO $con, int $offset, int $limit): array
{
    // préparation de la requête
    $prepare = $con->prepare("
        SELECT * FROM `localisations`
        ORDER BY `id` DESC
        LIMIT ?,?
        ");
    $prepare->bindParam(1, $offset, PDO::PARAM_INT);
    $prepare->bindParam(2, $limit, PDO::PARAM_INT);
    // essai / erreur
    try {
        // exécution de la requête
        $prepare->execute();

        // on renvoie le tableau (array) indexé contenant tous les résultats (peut être vide si pas de message).
        $result = $prepare->fetchAll();
        // bonne pratique
        $prepare->closeCursor();
        return $result;

        // en cas d'erreur sql
    } catch (Exception $e) {
        // erreur de requête SQL
        die($e->getMessage());
    }
}

// création d'une fonction qui créer la pagination
function pagination(int $nbtotalLocalisation, string $get = "page", int $pageActu = 1, int $perPage = 3): string
{

    // variable de sortie
    $sortie = "";

    // si pas de page nécessaire
    if ($nbtotalLocalisation === 0) return "";

    // nombre de pages, division du total des messages mis à l'entier supérieur
    $nbPages = ceil($nbtotalLocalisation / $perPage);

    // si une seule page, pas de lien à afficher
    if ($nbPages == 1) return "";

    // nous avons plus d'une page
    $sortie .= "<p>";


    // tant qu'on a des pages
    for ($i = 1; $i <= $nbPages; $i++) {
        // si on est au premier tour de boucle
        if ($i === 1) {
            // si on est sur la première page
            if ($pageActu === 1) {
                // pas de lien
                $sortie .= "<< < 1 |";
                // si nous sommes sur la page 2
            } elseif ($pageActu === 2) {
                // tous les liens vont vers la page 1
                $sortie .= " <a href='./'><<</a> <a href='./'><</a> <a href='./'>1</a> |";
                // si nous sommes sur d'autres pages, le retour va vers la page précédente
            } else {
                $sortie .= " <a href='./'><<</a> <a href='?$get=" . ($pageActu - 1) . "'><</a> <a href='./'>1</a> |";
            }
            // nous ne sommes pas sur le premier ni dernier tour de boucle
        } elseif ($i < $nbPages) {
            // si nous sommes sur la page actuelle
            if ($i === $pageActu) {
                // pas de lien
                $sortie .= "  $i |";
            } else {
                // si nous ne sommes pas sur la page actuelle
                $sortie .= "  <a href='?$get=$i'>$i</a> |";
            }
            // si nous sommes sur le dernier tour de boucle
        } else {
            // si nous sommes sur la dernière page
            if ($pageActu >= $nbPages) {
                // pas de lien
                $sortie .= "  $nbPages > >>";
                // si nous ne sommes pas sur la dernière page
            } else {
                // tous les liens vont vers la dernière page
                $sortie .= "  <a href='?$get=$nbPages'>$nbPages</a> <a href='?$get=" . ($pageActu + 1) . "'>></a> <a href='?$get=$nbPages'>>></a>";
            }
        }
    }
    $sortie .= "</p>";
    return $sortie;
}