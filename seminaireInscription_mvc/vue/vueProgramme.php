<?php 
include "./vue/entete.php";
?>

<table>  

    <?php
    foreach ($heures as $heure) {
        if (!empty($conferencesParHeure[$heure])) {
            echo "<th>" . $heure . "</th>";
            echo "<th>  Intervenant </th>";
            echo "<th>  Salle </th>";
            foreach ($conferencesParHeure[$heure] as $conference) {
                echo "<tr>";
                echo "<td>" . $conference->description . "</td>";
                echo "<td>" . $conference->intervenant . "</td>";
                echo "<td>" . $conference->salle . "</td>";
                echo "</tr>";
            }
        }
    }
    ?>
</table>

<?php 
include "./vue/pied.php";
?>

