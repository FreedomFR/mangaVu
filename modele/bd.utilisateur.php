<?php
include_once "bd.inc.php";

function login($mail, $mdp) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $util = getUtilisateurByMailU($mail);
    $mdpBD = $util["mdp"];
    $nom = $util["nom"];

    if (trim($mdpBD) == trim(crypt($mdp, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mail"] = $mail;
        $_SESSION["mdp"] = $mdpBD;
        $_SESSION["nom"] = $nom;
    }
}
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
    unset($_SESSION["nom"]);

} 

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getUtilisateurByMailU($_SESSION["mail"]);
        if ($util["mail"] == $_SESSION["mail"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

    function getUtilisateurByMailU($mail) {

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from utilisateur where mail=:mail");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->execute();
            
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    

    function addUtilisateur($mail, $mdp, $nom) {
        try {
            $cnx = connexionPDO();
    
            $mdpUCrypt = crypt($mdp, "siteWeb");
            $req = $cnx->prepare("insert into utilisateur (mail, mdp, nom) values(:mail,:mdp,:nom)");
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdpUCrypt, PDO::PARAM_STR);
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getMailULoggedOn(){
        if (isLoggedOn()){
            $ret = $_SESSION["mail"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }
    
?>