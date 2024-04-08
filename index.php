<?php

/**
*	Controleur principal  
*/

require dirname(__FILE__) . "/app/controllers/config.php";

require RACINE . "/controllers/route.php";

require RACINE . "/modele/authentification.inc.php"; // pour pouvoir utiliser isLoggedOn()


if (isset($_GET["action"])) {
	$action = $_GET["action"];
}
$action = isset($_GET["action"]) ? $_GET ["action"]: "default";
//Ajoute un controleur secondaire ($fichier) en fonction du metier ($action) :
$fichier = redirecTo($action);
require RACINE . "/controllers/" . $fichier;

?>