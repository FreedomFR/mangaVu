<?php
include_once "bd.inc.php";

function login($email, $password) {
    if (!isset($_SESSION)) {
        session_start();
    }  

    $util = getUtilisateurByMailU($email);
    $mdpBD = $util["password"];
    $name = $util["name"];

    if (trim($mdpBD) == trim(crypt($password, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $mdpBD;
        $_SESSION["name"] = $name;
    }
}
function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["name"]);
    
} 

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["email"])) {
        $util = getUtilisateurByMailU($_SESSION["email"]);
        if ($util["email"] == $_SESSION["email"] && $util["password"] == $_SESSION["password"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

    function getUtilisateurByMailU($email) {

        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from mrbs_users where email=:email");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->execute();
            
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    

    function addUtilisateur($email, $password, $name) {
        try {
            $cnx = connexionPDO();
    
            $mdpUCrypt = crypt($password, "sel");
            $req = $cnx->prepare("insert into mrbs_users (email, password, name) values(:email,:password,:name)");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':password', $mdpUCrypt, PDO::PARAM_STR);
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    function getMailULoggedOn(){
        if (isLoggedOn()){
            $ret = $_SESSION["email"];
        }
        else {
            $ret = "";
        }
        return $ret;
            
    }
    
?>