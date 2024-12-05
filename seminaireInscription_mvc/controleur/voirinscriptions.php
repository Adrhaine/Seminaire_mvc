<?php

include "./fonctions/fonctionsAccesDonnees.php";
include "./fonctions/fonctionsGestion.php";

if (!estAdmin()) {
    echo "Erreur : Veuillez vous connecter en Admin.";
    echo "<br>";
    echo "<td><a href='./?action=connexion'>Se connecter</a></td>";
    exit;
}

$conferences = donnerToutesLesConferences();


if (empty($conferences)) {
    $message = "Aucune conférence n'a été programmée.";
} else {
    $message = "Liste des inscriptions par conférence";
}


include "./vue/vueListeInscrit.php";
?>