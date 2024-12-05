<?php
include "./controleur/controleurPrincipal.php";
session_start();

if (isset($_GET["action"])){
    $action = $_GET["action"];
}
else{
    
    $action = "defaut";
}

$fichier = controleurPrincipal($action);
include "./controleur/$fichier";

?>
     
