<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.listeMangaLu.php";

// recuperation des donnees GET, POST, et SESSION
$id = $_GET["id"];


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage
$detailManga = getManga($id);
$listeGenre = getMangaGenre($id);

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
include "$racine/vue/header.php";
include "$racine/vue/vueManga.php";
include "$racine/vue/pied.php";

?>