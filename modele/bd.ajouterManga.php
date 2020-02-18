<?php
include_once "bd.inc.php";

function ajouterManga($titre, $chapitre, $image){
    try {
        $cnx = connexionPDO();
        $dateL = date("Y-m-d H:i:s");

        $req = $cnx->prepare("insert into MangaLu (titre, chapitre, image, dateLu) values(:titre, :chapitre, :image, :dateL)");
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':chapitre', $chapitre, PDO::PARAM_STR);
        $req->bindValue(':image', $image, PDO::PARAM_STR);
        $req->bindValue(':dateL', $dateL);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
