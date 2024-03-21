<?php 
    session_start();

    $jsonString = file_get_contents("scrutin.json");
    $scrutins = json_decode($jsonString, true);

    $idScrutin = $_POST["id"];

    foreach($scrutins as $prop => $val){
        if ($val["id"] == $idScrutin){

            if ($_SESSION["uid"] === $val["CID"]){
                echo "<p> <font color=\"red\">Vous êtes le créateur de ce scrutin !!!! </font></p>";
            }

            echo "<h5>".$val["nom"]." - ".$val["question"]."</h5>
            
            <table id=\"tableDetailChoix\">";


            foreach($val["Choix"] as $propC => $valC){
                echo "<tr> <td> -".$valC." </td>
                <td> <input type=\"button\" value=\"vote\" > </td>
                </tr>";
                
            }

            echo "</table>";


            echo "<p> Nombre de votant au total : ".$val["nbrVotant"]."</p>";
        }
    }

?>