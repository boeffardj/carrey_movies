<?php 
if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}

$inscrit = false;

include_once RACINE . "/modele/bd.utilisateur.inc.php";
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["pseudo"])) {
    
    if ($_POST["email"] != "" && $_POST["password"] != "" && $_POST["pseudo"] != "") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $pseudo = $_POST["pseudo"];
        $prenom = empty ($_POST["prenom"])? NULL: $_POST["prenom"];
        $nom = empty ($_POST["nom"])? NULL: $_POST["nom"];
        $genre = empty ($_POST["genre"])? NULL: $_POST["genre"];
        $naissance = empty ($_POST["naissance"])? NULL: $_POST["naissance"];
        // enregistrement des donnees
        $ret = addUtilisateur($email, $password, $pseudo, $nom, $prenom, $naissance , $genre);
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
