<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.utilisateur.php";

// recuperation des donnees GET, POST, et SESSION



// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

// traitement si necessaire des donnees recuperees
if (isLoggedOn()){
    $mail = getMailULoggedOn();
    $util = getUtilisateurByMailU($mail);

    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Mon profil";
    include "$racine/vue/header.php";
    include "$racine/vue/vueConfirmation.php";
    include "$racine/vue/pied.php";
}
else{
    $titre = "Mon profil";
    include "$racine/vue/header.php";
    include "$racine/vue/pied.php";
}

?>