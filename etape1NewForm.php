<?php
// Chemin du fichier JSON
$filePath = 'scrutin.json';

// Lire le contenu actuel du fichier JSON
$currentData = file_get_contents($filePath);
if ($currentData === false) {
    die('Impossible de lire le fichier JSON.');
}
$currentDataArray = json_decode($currentData, true);
if ($currentDataArray === null) {
    die('Impossible de décoder le JSON.');
}

// incrémenter l'id
$maxId = 0;
foreach ($currentDataArray as $data) {
    if ($data['id'] > $maxId) {
        $maxId = $data['id'];
    }
}
$newId = $maxId + 1;

// Nouvelles données à ajouter avec le nouvel ID
$newData = array(
    "id" => $newId,
    "nom" => $_POST["nom"],
    "question" => $_POST["question"],
    "nbrVotant" => intval($_POST["nbr"]),
    "Choix" =>  $_POST["tableauProp"]
);

$newDataArray = array($newData);
// Fusionner les nouveaux tableaux de données avec les données existantes
$newDataArray = array_merge($currentDataArray, $newDataArray);

// Convertir le tableau en format JSON
$jsonData = json_encode($newDataArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

// Écrire les données JSON dans le fichier
if (file_put_contents($filePath, $jsonData) === false) {
    die('Impossible d\'écrire dans le fichier JSON.');
}

echo 'Les nouvelles données ont été ajoutées avec succès dans le fichier JSON.  '.$_POST["nbrProp"];
?>