<?php 
session_start();
$jsonString = file_get_contents('logs.json');
$filedata = json_decode($jsonString, true);
//echo "<pre>".print_r($filedata)."</pre>";

$uid = $_POST["log"];
$pword = $_POST["pw"];
$gbool = true;
foreach ($filedata as $idx => $value) 
{
    # code...
    if($value["uid"] == $uid && $value["password"] == $pword)
    {
       
        $_SESSION["uid"] = $uid;
        $_SESSION["lastConnect"] = time();
        echo "Connecté " . $uid." !";
        echo '</br>
        <button type="button" class="btn btn-primary" onclick ="loadIndexPage(true)">Retour </button>';
        $gbool = false;
        break;
    }
   
    
}; 
if($gbool)
{
    echo "non non non";
}
?>