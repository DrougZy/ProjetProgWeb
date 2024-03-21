<?php
session_start();
    if($_POST["disconnected"])
    {
        session_unset();
        echo "trop rigolo";
    }
    echo 
    '
        <h1> Bienvenue </h1>
        <button type="button" class="btn btn-secondary" onclick ="loadConnectPage()">Se connecter</button>
        <button type="button" class="btn btn-secondary" onclick="loadSignPage()">S\'identifier</button>
    ';
?>