<?php

    $html = "<h5> Nouveau Scrutin </h5>";

    $html .= " <form onsubmit=\"etape1NewForm()\">
                    <p>
                    Entrez le nom du Sondage : 
                    <input type=\"text\" id=\"input-nom-formulaire\"placeholder=\"Le nom...\" autocomplete=\"off\" >
                    </p>

                    <p>
                    Entrez la question du Sondage :
                    <input type=\"text\" id=\"input-question-formulaire\"placeholder=\"La question...\" autocomplete=\"off\" >
                    </p>

                    <p>
                    Entrez le nombre de participant (entre 1 et 100) :  
                    <input type=\"number\" id=\"input-nbr-formulaire\" max=\"100\" min=\"1\">
                    </p>

                    <br>
                    <div id=\"nouveauChoix\">
                        <h6>Les Propositions</h6>
                        Ajoutez une proposition : 
                        <input type=\"text\" id=\"input-ajoute-choix\"  autocomplete=\"off\" > 
                        <input type=\"button\" value=\"ajout\" onclick=\"ajoutChoix()\">
                    </div>

                    <br>
                    <input type=\"submit\" value=\"Valider\" />

                    <div id=\"messageErreurNouveauFormulaire\">
                    </div>

                </form>
                ";

    echo $html;


?>