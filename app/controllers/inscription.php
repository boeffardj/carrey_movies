<?php 
if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

include_once RACINE . "/modele/bd.utilisateur.inc.php";
if (isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["pseudo"])) {

if ($_POST["mail"] != "" && $_POST["mdp"] != "" && $_POST["pseudo"] != "") {
    $maiU = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $pseudo = $_POST["pseudo"];

    // enregistrement des donnees
    $ret = addUtilisateur($mail, $mdp, $pseudo, $prenom, $nom , $genre, $naissance);
    if ($ret) {
        $inscrit = true;
    } else {
        $msg = "l'utilisateur n'a pas été enregistré.";
    }
}
else {
$msg="Renseigner tous les champs...";    
}
}
if ($inscrit) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription confirmée";
    include RACINE . "/vue/header.php";
    include RACINE . "/vue/vueConfirmationInscription.php";
    include RACINE . "/vue/footer.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Inscription pb";
    include RACINE . "/vue/header.php";
    include RACINE . "/vue/inscription.php";
    include RACINE . "/vue/footer.php";
}
?>
