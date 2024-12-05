<?php
include "./fonctions/fonctionsAccesDonnees.php";
include "./fonctions/fonctionsGestion.php";


$professions = donnerLesProfessions();

$nom = '';
$prenom = '';
$mail = '';
$ville = '';
$profession = '';


$btn = "Inscription";
if (isset($_POST["btn"])){
	$btn = $_POST["btn"];
}

switch ($btn){
	case "Annuler" :
      $nom = '';
      $prenom = '';
      $mail = '';
      $ville = '';
      $profession = '';

		break;
		
	case "Valider" :
         $nom = $_POST["nom"];
         $prenom = $_POST["prenom"];
         $mail = $_POST["mail"];
         $ville = $_POST["ville"];
         $profession = $_POST["profession"];

		   verifierDonneesInscription($nom, $prenom, $mail, $ville);
	
         if (donnerNbErreurs() > 0){
            afficherErreurs();
         }
         else {
            sauverDonneesInscription($nom, $prenom,$mail,$ville, $profession);
            echo '<div style="color: green; font-weight: bold; font-size : 20px; text-align: center;">Inscription validée</div>';
            //print_r($_SESSION);
         }


}

include "./vue/vueInscription.php";

?>


  
        
        
