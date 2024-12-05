<?php
include "./fonctions/fonctionsAccesDonnees.php";
include "./fonctions/fonctionsGestion.php";

if (isset($_POST["validerConnexion"])) {  // Vérifie si le bouton "Valider" a été cliqué
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];

    if (verifier($login, $mdp)) {
        header("Location: ./?action=voirinscriptions");  // Redirige en cas de succès
        exit();
    } else {
        echo "<h2>Erreur de connexion. Veuillez réessayer.</h2>";
    }
}

include "./vue/vueConnexion.php";
?>
