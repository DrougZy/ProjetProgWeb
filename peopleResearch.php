<?php 

    echo "<div class ='block'>";
    echo 'Rechercher : <input type="text" id = "searchUsers" placeholder ="ryan"> 
    <input class ="btn btn-light" type="button" value ="Search" onclick ="assignUserToVote()">
            </div>
        ';
    $jsonString = file_get_contents('logs.json');
    $filedata = json_decode($jsonString, true);
    
   
    
   /* echo "<table><thead></thead><tbody>";
    foreach ($filedata as $idx => $value) 
    {
        echo "<tr>
                    <td>
                   
                    Login :".$value["uid"]." Mot de Passe : ".$value["password"] ."
                    <input class =\"on-left\" type=\"button\" id=\"".$value["uid"]."\" value=\"Detail\" \">
                    </td>
            </tr>";
    }
    echo "</tbody></table>";*/

    $html = "";
    $html .= "<table id ='tableFullPage'><thead>Quels utilisateurs souhaitez vous ajouter a sondage : </thead><tbody  id ='tableFullPage'>";
    $bool = false;
    if(isset($_POST["stringSearched"]))
    {
        $string = $_POST["stringSearched"];
        foreach ($filedata as $idx => $value) 
        {
            if(str_contains(strtolower($value["uid"]),strtolower( $string) ))
            {
                $html .= "<tr><td>Login :"
                .$value["uid"]."</td>  <td class =\"aligner\"><input class=\"aligner\" type=\"checkbox\" onclick=\"addUserToSelection(\"".$value["uid"]."\")\" id=\"user\"</td></tr>";
            }
        }
    }
    else{
        foreach ($filedata as $idx => $value) 
        {
            $html .= "<tr><td>Login :"
            .$value["uid"]."</td>  <td class =\"aligner\"><input class=\"aligner\" type=\"checkbox\" onclick=\"addUserToSelection('".$value["uid"]."')\" id=\"user\"</td></tr>";
        }
    }
    $html .= "</tbody></table>";
    $html .= '<input class ="btn btn-primary" type=\"button\" id=\"validerUsers\" onclick ="assignUserToVote()" value="Valider">';
    echo $html;

?>