<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}
 require ('header.php');
?>
<div id="form">
        <form action="?action=connexion" method="post">

                    
            <p><label for="email"> mail </label>
                <input type="text" name="email" 
                    placeholder="Votre mail" value=<?php echo $_POST["email"] ?? ''?>></p>
                    
            <p><label for="mdp">Password </label>
                <input type="text" name="mdp" 
                    placeholder="Votre mot de passe" value=<?php echo $_POST["mdp"] ?? ''?>></p>
                <input type="submit" value="Connexion">
            <a href="./?action=register">Inscription</a>
        </form>
    </div>

    <?php require ('footer.php'); ?>