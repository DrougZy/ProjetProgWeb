<?php

    $html = "<h5> Nouveau Scrutin </h5>";

    $html .= " <form onsubmit=\"etape1NewForm()\">
                    Entrez le nom du Scrutin : 
                    <input type=\"text\" id=\"input-nom-formulaire\"placeholder=\"Scrutin...\">
                    
                    <br>

                    Entrez le nombre de participant (entre 1 et 10) :  
                    <input type=\"number\" id=\"input-nbr-formulaire\" max=\"10\" min=\"1\">


                    <br>
                    <input type=\"submit\" value=\"Valider\" />
                </form>
    ";
    echo $html;

   
   
   
   
   
    $oui = " Ajouter les différents vote : 
        <br>
        <div id=\"nouveauChoix\">
            Choix : 
            <input type=\"text\" id=\"input-ajoute-choix\" > 
            <input type=\"button\" value=\"ajout\" onclick=\"ajoutChoix()\">
        </div>
        ";


?>