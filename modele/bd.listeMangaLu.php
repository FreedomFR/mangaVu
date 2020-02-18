<?php
include_once "bd.inc.php";

function getAllManga() {

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

function getAllManga1($mail) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("SELECT * FROM mangaUtilisateur mu INNER JOIN manga m ON m.id = mu.idManga INNER JOIN utilisateur u ON u.id = mu.idUtilisateur WHERE mail = :mail ORDER BY titre");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
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

//function getAllManga($id) {
//
//    try {
//        $cnx = connexionPDO();
//        $req = $cnx->prepare("select * from mangaUtilisateur where idUtlisateur = :id
//                                        inner join manga on manga.id = mangaUtilisateur.idManga
//                                        order by manga.titre");
//        $req->bindValue(':id', $id, PDO::PARAM_STR);
//        $req->execute();
//        $resultat = [];
//
//        $ligne = $req->fetch(PDO::FETCH_ASSOC);
//        while ($ligne) {
//            $resultat[] = $ligne;
//            $ligne = $req->fetch(PDO::FETCH_ASSOC);
//        }
//    } catch (PDOException $e) {
//        print "Erreur !: " . $e->getMessage();
//        die();
//    }
//    return $resultat;
//}

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
                                        inner join lienMangaGenre on lienMangaGenre.idManga = MangaLu.id
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


/*CREATE VIEW Manga
AS
SELECT
    m.id,
    m.titre,
    m.image,
    u.mail,
    u.nom,
    u.mdp,
    u.rang,
    mu.idUtilisateur,
    mu.chapitre,
    mu.dateLu,
    lmg.idManga,
    lmg.idGenre,
    g.libelle
FROM
    manga m
INNER JOIN mangaUtilisateur mu
    ON mu.idManga = m.id
INNER JOIN utilisateur u
    ON u.id = mu.idUtilisateur
INNER JOIN lienMangaGenre lmg
    ON lmg.idManga = m.id
INNER JOIN genre g
    ON g.id = lmg.idGenre*/