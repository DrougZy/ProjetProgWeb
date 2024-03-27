<?php 
    session_start();
    $jsonString = file_get_contents('scrutin.json');
    $filedata = json_decode($jsonString, true);
    $array = $_POST["t"];
    $newData = array(
        "id" => $_SESSION["newId"],
        "nom" => $_SESSION["nomQuest"],
        "CID" =>  $_SESSION["uid"],
        "question" => $_SESSION["question"],
        "nbrVotant" => $_SESSION["nbrVotant"],
        "Choix" =>  $_SESSION["choix"],
        "votants" => $array
    );

$currentData = file_get_contents('scrutin.json');
if ($currentData === false) {
    die('Impossible de lire le fichier JSON.');
}
$currentDataArray = json_decode($currentData, true);
$newDataArray = array($newData);
// Fusionner les nouveaux tableaux de données avec les données existantes
$newDataArray = array_merge($currentDataArray, $newDataArray);

// Convertir le tableau en format JSON
$jsonData = json_encode($newDataArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Écrire les données JSON dans le fichier
if (file_put_contents('scrutin.json', $jsonData) === false) {
    die('Impossible d\'écrire dans le fichier JSON.');
}
?>