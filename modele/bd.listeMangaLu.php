<?php
include_once "bd.inc.php";

function getAllMAnga() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from MangaLu order by titre");
        $req->execute();
        $resultat = [];

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getManga($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from MangaLu where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $resultat = [];
        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getMangaGenre($id) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from MangaLu 
                                        inner join lienMangaGenre on lienMangaGenre.idManga = MangaLu.genre
                                        inner join genre on genre.id = lienMangaGenre.idGenre
                                        where lienMangaGenre.idManga=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();
        $resultat = [];

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}
