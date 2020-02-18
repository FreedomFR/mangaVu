<?php

function controleurPrincipal($action) {
    $lesActions = array();
    $lesActions["defaut"] = "listemanga.php";
    $lesActions["detail"] = "detailManga.php";
    $lesActions["listeManga"] = "listemanga.php";
    $lesActions["ajouter"] = "ajouterManga.php";
    $lesActions["connection"] = "connection.php";
    $lesActions["inscription"] = "Inscription.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["deconnexion"] = "deconnexion.php";

    if (array_key_exists($action, $lesActions)) {
        return $lesActions[$action];
    }
    else {
        return $lesActions["defaut"];
    }
}

?>