<?php
include "./fonctions/fonctionsAccesDonnees.php";


$heures = donnerLesHeuresCreneaux();
$conferencesParHeure = array();
    foreach ($heures as $heure) {
        $conferencesParHeure[$heure] = donnerLesConferences($heure);
    }


include "./vue/vueProgramme.php";

?>