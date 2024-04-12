<?php 
if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

include_once RACINE . "/modele/bd.utilisateur.inc.php";
if (isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["pseudo"])) {

if ($_POST["email"] != "" && $_POST["mdp"] != "" && $_POST["pseudo"] != "" && $_POST["prenom"] && $_POST["nom"] && $_POST["genre"] && $_POST["naissance"]) {
    $maiU = $_POST["email"];
    $mdp = $_POST["mdp"];
    $pseudo = $_POST["pseudo"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $genre = $_POST["genre"];
    $naissance = $_POST["naissance"];

    // enregistrement des donnees
    $ret = addUtilisateur($email, $mdp, $pseudo, $prenom, $nom , $genre, $naissance);
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
