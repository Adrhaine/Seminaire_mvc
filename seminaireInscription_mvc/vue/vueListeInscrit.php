<?php 
include "./vue/entete.php";
?>

<?php
foreach ($conferences as $conference) {
    echo '<table border="1" style="margin-bottom: 20px; width: 100%;">';
   
    echo '<thead>';
    echo '<tr>';
    echo '<th colspan="6" style="background-color: #333; color: white;">';
    echo $conference->id . ' - ' . $conference->creneau . ' - ' . $conference->description;
    echo '</th>';
    echo '</tr>';
    echo '</thead>';

    $participants = $conference->participants;

    if (!empty($participants)) {
        echo '<tr>';
        echo '<th>Nom</th>';
        echo '<th>Prénom</th>';
        echo '<th>Ville</th>';
        echo '<th>Profession</th>';
        echo '<th>Email</th>';
        echo '</tr>';

        foreach ($participants as $participant) {
            echo '<tr>';
            echo '<td>' . $participant->nom . '</td>';
            echo '<td>' . $participant->prenom . '</td>';
            echo '<td>' . $participant->ville . '</td>';
            echo '<td>' . $participant->profession . '</td>';
            echo '<td>' . $participant->mail . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="6">Aucun participant inscrit pour cette conférence.</td>';
        echo '</tr>';
    }

    echo '</table>';
}
?>

<?php 
include "./vue/pied.php";
?>
