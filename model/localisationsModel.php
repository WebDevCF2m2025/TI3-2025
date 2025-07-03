<?php
//R
function getAllLocations(PDO $connect): array {
    $stmt = $connect->prepare("SELECT * FROM localisations ORDER BY id");
    
    try {
        $stmt->execute();
        $locations = $stmt->fetchAll();
        $stmt->closeCursor();
        return $locations;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}


function getLocationById(PDO $connect, int $id): array|false {
    $stmt = $connect->prepare("SELECT * FROM localisations WHERE id = ?");
    
    try {
        $stmt->execute([$id]);
        $location = $stmt->fetch();
        $stmt->closeCursor();
        return $location;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

//VERIFICATION function()


// C
function addLocation(PDO $connect, string $nom, string $adresse, string $codepostal, float $latitude, float $longitude): bool {
    $stmt = $connect->prepare("
        INSERT INTO localisations (nom, adresse, codepostal, latitude, longitude) 
        VALUES (?, ?, ?, ?, ?)
    ");
    
    try {
        $result = $stmt->execute([$nom, $adresse, $codepostal, $latitude, $longitude]);
        $stmt->closeCursor();
        return $result;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

// U
function updateLocation(PDO $connect, int $id, string $nom, string $adresse, string $codepostal, float $latitude, float $longitude): bool {
    $stmt = $connect->prepare("
        UPDATE localisations 
        SET nom = ?, adresse = ?, codepostal = ?, latitude = ?, longitude = ? 
        WHERE id = ?
    ");
    
    try {
        $result = $stmt->execute([$nom, $adresse, $codepostal, $latitude, $longitude, $id]);
        $stmt->closeCursor();
        return $result;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}

//D
function deleteLocation(PDO $connect, int $id): bool {
    $stmt = $connect->prepare("DELETE FROM localisations WHERE id = ?");
    
    try {
        $result = $stmt->execute([$id]);
        $stmt->closeCursor();
        return $result;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
}