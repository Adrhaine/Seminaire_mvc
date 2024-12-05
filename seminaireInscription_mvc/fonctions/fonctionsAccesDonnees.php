<?php
/**
 * @access private
 * @return type
 */
function chargeJSONseminaire()
{
    $json_source = file_get_contents('data/seminaire.json');
    $document = json_decode($json_source);
    return $document;
}

/**
 * @access private
 * @return type
 */
function chargeJSONprofessions()
{
    $json_source = file_get_contents('data/professions.json');
    $document = json_decode($json_source);
    return $document;
}

/**
 * @access private
 * @param type $doc
 */
function sauveJSONseminaire($doc){
    $json_data = json_encode($doc, JSON_PRETTY_PRINT);
    file_put_contents('data/seminaire.json', $json_data);
}

/**
 * @access private
 * @return type
 */
function chargeJSONadmin()
{
    $json_source = file_get_contents('data/admin.json');
    $document = json_decode($json_source);
    return $document;
}

/**
 * Retourne l'intitulé du séminaire
 * @return chaîne
 */
function donnerIntituleSeminaire()
{
    $seminaire = chargeJSONseminaire();
	return $seminaire->seminaire->intitule;

}

/**
 * Retourne la liste de tous les créneaux horaires, heures de début des conférences
 * le tableau retourné commence à l'indide 0
 * @return  tableau 
 * 
 */
function donnerLesHeuresCreneaux(){
	$seminaire = chargeJSONseminaire();
	$creneaux = [];
	foreach ($seminaire->seminaire->creneau as $creneau) {
		$creneaux[] = $creneau->heure;
	}
	return $creneaux;
}

/**
 * Retourne toutes les conférences commençant à l'heure donnée sous forme d'un tableau
 * @param chaîne $heure
 * @return  tableau 
 */
function donnerLesConferences($heure){
    $seminaire = chargeJSONseminaire();
    $conferences = array();
    foreach ($seminaire->seminaire->creneau as $creneau) {
        if ($creneau->heure == $heure) {
            foreach ($creneau->conference as $conf) {
                $conferences[] = $conf;
            }
        }
    }
    return $conferences;
}

/**
 * Enregistre les informations d'un visiteur
 * @param chaîne $nom
 * @param chaîne $prenom
 * @param chaîne $mail
 * @param chaîne $ville
 * @param chaîne $profession
 */
function sauverDonneesInscription($nom, $prenom,$mail,$ville, $profession){
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['mail'] = $mail;
	$_SESSION['ville'] = $ville;
	$_SESSION['profession'] = $profession;
}

/**
 * Retourne toutes les professions possibles
 * le tableau retourné commence à l'indice 0
 * @return  tableau 
 */
function donnerLesProfessions(){
	$professions = chargeJSONprofessions();
	return $professions->professions;
}

/**
 * Vérifie si le visiteur a déjà rempli son formulaire d'inscription
 * @return boolean
 */
function estInscrit(){
	if (session_status() == PHP_SESSION_NONE) {
        session_start(); // Démarrer la session seulement si aucune session n'est active
    }
    if (isset($_SESSION['nom']) && isset($_SESSION['prenom']) && isset($_SESSION['mail']) && isset($_SESSION['ville']) && isset($_SESSION['profession'])) {
        return true;
    }
    return false;
}

/**
 * Enregistre un participant et ses choix de conférences
 * @param tableau $lesChoix : les choix du participant
 */
function  enregistre($lesChoix){
	$document = chargeJSONseminaire();
    foreach ($lesChoix as $choix) {
        foreach ($document->seminaire->creneau as $creneau) {
            foreach ($creneau->conference as $conference) {
                if ($conference->id == $choix) {
                    if (!isset($conference->participants)) {
                        $conference->participants = [];
                    }
                    $participant = [
                        'nom' => $_SESSION['nom'],
                        'prenom' => $_SESSION['prenom'],
                        'mail' => $_SESSION['mail'],
                        'ville' => $_SESSION['ville'],
                        'profession' => $_SESSION['profession']
                    ];
                    $conference->participants[] = $participant;
                }
            }
        }
    }
    sauveJSONseminaire($document);
}

/**
 * Retourne toutes conférences sous forme d'un tableau
 * Le tableau commençe à l'indice 0
 * Chaque ligne du tableau contient les information sur une conférence :
 * son id, son creneau,sa description, son intervenant, sa salle et son nbPlaces
 * @return tableau
 */
function donnerToutesLesConferences() {
    $seminaire = chargeJSONseminaire();
    $conferences = array();

    foreach ($seminaire->seminaire->creneau as $creneau) {
        foreach ($creneau->conference as $conf) {
            $conf->creneau = $creneau->heure;
            $conferences[] = $conf;
        }
    }

    return $conferences;
}

/**
 * Retourne tous les participants inscrits à une conférence dont on fournit le numéro
 * Chaque ligne du tableau retourné contient le nom, le prénom, la profession,
 * la ville et le mail d'un participant
 * @param entier $numConference
 * @return  tableau 
 */
function donnerParticipants($numConference) {
    $seminaire = chargeJSONseminaire();
    $participants = array();

    foreach ($seminaire->seminaire->creneau as $creneau) {
        foreach ($creneau->conference as $conf) {
            if ($conf->id == $numConference) {
                if (isset($conf->participants)) {
                    foreach ($conf->participants as $participant) {
                        $participants[] = array(
                            'nom' => $participant->nom,
                            'prenom' => $participant->prenom,
                            'profession' => $participant->profession,
                            'ville' => $participant->ville,
                            'mail' => $participant->mail
                        );
                    }
                }
            }
        }
    }

    return $participants;
}
?>
