<?php 

echo "<button type=\"button\" class=\"btn btn-danger\" onclick=\"logBout()\">Se déconnecter</button>
      <div class=  \"centrer\">
          <h1> Bienvenue sur VoteMeta </h1>
          
      </div>
      <br>

      <div class=\"enLigne\">

        <div id=\"contents1\" class=\"border border-5\">
          <h5> Liste de mes scrutins </h4>
          <br>
        ";
          

            $jsonString = file_get_contents("scrutin.json");
            $data = json_decode($jsonString, true);

            foreach($data as $prop => $val)
            {
              echo "<p> ".($prop+1).
              ". Nom : ".
              $val["nom"].
              " <input type=\"button\" class=\"buttonDetail\" onclick = \"detailScrutin(".
              $val["id"].
              ")\" value=\"Detail\"> </p>";
            }
         
         echo   "
          <br>

          <div id=\"NewScrutin\">
            <h5> Création d'un nouveau Scrutin</h5>
            <input type=\"button\" onclick=\"creationScrutin()\" value=\"Créer\">
          </div>

            </div>

            <div id=\"contents2\" class=\"border border-5\">
                
            </div>

              <div id=\"testaffiche\">
              
              </div>

            </div>
          </div>
      "

  ?>