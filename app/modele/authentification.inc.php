<?php

include_once "bd.utilisateur.inc.php";

function login($mailU, $mdpU) {
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMailU($mailU);
    $mdpBD = $util["mdp"];


    if (trim($mdpBD) == trim(crypt($mdpU, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["email"] = $mailU;
        $_SESSION["mdp"] = $mdpBD;
    }
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["email"]);
    unset($_SESSION["mdp"]);
}

function getMailULoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["email"];
    }
    else {
        $ret = null;
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["email"])) {
        $util = getUtilisateurByMailU($_SESSION["email"]);
        if ($util["email"] == $_SESSION["email"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    logout();
}
?>