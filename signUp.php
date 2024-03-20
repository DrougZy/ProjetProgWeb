<?php

    echo 
    '<h1 id = "connect">Inscrivez-vous :</h1>

        <div id = "logs">
                coucou 
        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputEmail1">Nom d\'utilisateur :</label>
            <input type="email" class="form-control" id="usernameSign" aria-describedby="emailHelp" placeholder="Entrez votre nom d\'utilisateur">
        </div>
        <div class="form-group">
            <label  for="exampleInputPassword1">Mot de Passe :</label>
            <input  type="password" class="form-control" id="passwordSign" placeholder="Entrez votre mot de passe">
        </div>
        <div class="form-group">
            <label  for="exampleInputPassword1">Confirmez votre Mot de Passe :</label>
            <input  type="password" class="form-control" id="passwordSign2" placeholder="...">
        </div>
        <div>
        <button type="button" class="btn btn-success" onclick="newSubscriber()">Success</button>
        <button type="button" class="btn btn-danger" onclick="loadIndexPage()">Annuler</button>
        </div>
        ';

?>