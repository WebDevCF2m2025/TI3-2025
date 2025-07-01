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