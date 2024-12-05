<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/global.css" rel="stylesheet" type="text/css">
        <title></title>
    </head>
<?php
include_once "fonctions/fonctionsAccesDonnees.php";
include_once "fonctions/fonctionsGestion.php";
?>
<body>
    <h1><?php echo donnerIntituleSeminaire()?></h1>
    <nav>
        <ul>
            <li><a href="./?action=inscription">Inscription</a></li>
            <li><a href="./?action=programme">Voir le programme</a></li>
            <li><a href="./?action=choixconferences">Choisir ses conférences</a></li>
            <li><a href="./?action=connexion">Connexion Admin</a></li>
            <li><a href="./?action=voirinscriptions">Voir les inscrits aux conférences</a></li>
            <li><a href="./?action=deconnexion">Déconnexion</a></li>
        </ul>
    </nav>

