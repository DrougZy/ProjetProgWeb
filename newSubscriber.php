<?php 
    
    $username = $_POST["username"];
    $mdp1 = $_POST["mdp1"];
    $mdp2 = $_POST["mdp2"];
    $newData = array(
        "uid" => $username,
        "password" => $mdp1
    );
    if($mdp1 == $mdp2)
    {
        if(!file_exists('logs.json'))
        {
            file_put_contents('logs.json', $data);
        }
        else 
        {

            $oldJson = file_get_contents('logs.json');
            $oldData = json_decode($oldJson, true);
            $oldData[] = $newData;
            $jsonData = json_encode($oldData, JSON_PRETTY_PRINT);
            file_put_contents('logs.json', $jsonData);
            echo "Données enregistrées avec succès ! <br/>";
            //echo "OLD DATA <br/><pre>".print_r($oldData,true)."</pre>";
        }
       
    }
    else
        echo "non";
?>