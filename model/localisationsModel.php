<?php

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