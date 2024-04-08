<?php

function redirecTo($action="default"){
	$lesActions = array();
	$lesActions["default"]= "../vue/accueil.php";
	$lesActions["login"]= "../vue/authentification.php";
	$lesActions["logout"]="logout.php";
	$lesActions["register"]= "inscription.php";
	$lesActions["connexion"] = "connexion.php";
	$lesActions["deconnexion"]="deconnexion.php";
	$lesActions["profil"]="monProfil.php";

$controler_id = $lesActions[$action];

	//si le fichier n'existe pas :
	if(! file_exists(__DIR__ . '/'. $controler_id) ) die("Le fichier : " . $controler_id . " n'existe pas !");

	//si la clé "action" existe dans notre tableau "lesActions" :
    if (array_key_exists($action, $lesActions)) {
		// le fichier à inclure sera retourné :
        return $controler_id;
    } else {
        return $lesActions["default"];
    }
}

?>