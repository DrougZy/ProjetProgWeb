<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src = "script.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>VoteMeta</title>

  </head>

  <body>
    <div id="contents">

      <div class="centrer">
          <h1> Bienvenue sur VoteMeta </h1>
          
      </div>
      <br>

      <div class="enLigne">

        <div id="contents1" class="border border-5">
          <h5> Liste de mes scrutins </h4>
          <br>

          <?php

            $jsonString = file_get_contents("data.json");
            $data = json_decode($jsonString, true);

            foreach($scrutins = $data["scrutins"] as $prop => $val){
              echo "<p> ".($prop+1).". Nom : ".$val["nom"]." <input type=\"button\" class=\"buttonDetail\" onclick = \"detailScrutin(".$val["id"].")\" value=\"Detail\"> </p>";
            }
      

          ?>

          <br>

          <div id="NewScrutin">
            <h5> Création d'un nouveau Scrutin</h5>
            <input type="button" onclick="creationScrutin()" value="OH OUI">
          </div>

        </div>

        <div id="contents2" class="border border-5">
            
        </div>
      </div>
    </div>



  </body>
</html>