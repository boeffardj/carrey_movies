<?php

include_once "bd.inc.php";

function getUtilisateurs() {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur");
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    return $resultat;
}

function getUtilisateurByMailU($mailU) {

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from utilisateur where email=:email");
        $req->bindValue(':email', $mailU, PDO::PARAM_STR);
        $req->execute();
        
        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    return $resultat;
}

function addUtilisateur($email, $mdp, $pseudo, $nom , $prenom, $naissance, $genre) {
    try {
        $cnx = connexionPDO();

        $mdpCrypt = crypt($mdp, "sel");
        $req = $cnx->prepare("insert into utilisateur (email, mdp, pseudo, nom, prenom, naissance, genre) values(:email,:mdp,:pseudo,:nom,:prenom,:naissance,:genre)");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdpCrypt, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':naissance', $naissance, PDO::PARAM_STR);
        $req->bindValue(':genre', $genre, PDO::PARAM_STR);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        die( "Erreur !: " . $e->getMessage() );
    }
    var_dump($resultat);
    return $resultat;
}



if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) 
?>
