<?php

// Chemin du fichier JSON
$filePath = 'scrutin.json';

// Lire le contenu actuel du fichier JSON
$currentData = file_get_contents($filePath);

// Vérifier si la lecture du fichier a réussi
if ($currentData === false) {
    die('Impossible de lire le fichier JSON.');
}

// Convertir le JSON en tableau associatif PHP
$currentDataArray = json_decode($currentData, true);

// Vérifier si le décodage JSON a réussi
if ($currentDataArray === null) {
    die('Impossible de décoder le JSON.');
}



// Nouvelles données à ajouter
$newData = array(
    "id" => 1,
    "nom" => $_POST["nom"],
    "question" => $_POST["question"],
    "nbrVotant" => intval($_POST["nbr"]),
    "Choix" =>  $_POST["tableauProp"]
);

// Ajouter les nouvelles données au tableau existant
$currentDataArray[] = $newData;

// Convertir le tableau en format JSON
$jsonData = json_encode($currentDataArray);

// Écrire les données JSON dans le fichier
if (file_put_contents($filePath, $jsonData) === false) {
    die('Impossible d\'écrire dans le fichier JSON.');
}

echo 'Les nouvelles données ont été ajoutées avec succès dans le fichier JSON.  '.$_POST["nbrProp"];
?>