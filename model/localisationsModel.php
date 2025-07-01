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
    $request = $connect->prepare("SELECT * FROM `localisations`");
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
