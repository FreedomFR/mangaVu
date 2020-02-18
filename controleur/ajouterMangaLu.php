<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.ajouterManga.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage


// traitement si necessaire des donnees recuperees


// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Ajouter manga lu";
include "$racine/vue/header.php";
include "$racine/vue/vueAjouterMangaLu.php";
include "$racine/vue/pied.php";

?>