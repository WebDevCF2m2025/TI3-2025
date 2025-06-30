<?php
# TI3-2025-Sam/model/localisationsModel.php

// Fonction pour récupérer les localisations
function getLocalisations(PDO $connect): array {
    $sql  = " SELECT * FROM localisations ";
    try{
        $query = $connect->query($sql);
        $result = $query->fetchAll();
        $query->closeCursor();
        return $result;
    } catch (Exception $e){
        die($e->getMessage());
    }
}

