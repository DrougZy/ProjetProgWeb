<?php 

    $jsonString = file_get_contents("scrutin.json");
    $scrutins = json_decode($jsonString, true);

    $uid = $_POST["id"];

    foreach($scrutins as $prop => $val){
        /**/ 
        if ($val["id"] == $uid){
            echo "<p> Nombre de votant au total : ".$val["nbrVotant"]."</p>";
        }
    }


?>