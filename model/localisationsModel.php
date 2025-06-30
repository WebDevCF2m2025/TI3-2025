<?php
//localisationModel.php





function getAllLocations(PDO $connect):array{
    $locations = $connect -> prepare("
            SELECT * FROM localisations");
                 
    try{
        $locations -> execute();
        $location = $locations->fetchAll();
        $locations -> closeCursor();
        return $location;
    }catch(PDOException $e){
        
        die($e->getMessage());    
    }
};
