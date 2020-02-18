<?php

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.utilisateur.php";

$inscrit = false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["nom"])) {

    if ($_POST["mail"] != "" && $_POST["mdp"] != "" && $_POST["nom"] != "") {
        $mailU = $_POST["mail"];
        $mdpU = $_POST["mdp"];
        $pseudoU = $_POST["nom"];

        // enregistrement des donnees
        $ret = addUtilisateur($mailU, $mdpU, $pseudoU);
        if ($ret) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas été enregistré.";
        }
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}

if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include "$racine/vue/header.php";
    include "$racine/vue/vueConfirmation.php";
    include "$racine/vue/pied.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription problème";
    include "$racine/vue/header.php";
    include "$racine/vue/vueInscription.php";
    include "$racine/vue/pied.php";
}
?>