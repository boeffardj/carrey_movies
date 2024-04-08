<?php

if ( $_SERVER["SCRIPT_FILENAME"] == str_replace(DIRECTORY_SEPARATOR, '/',  __FILE__) ) {
	// Un MVC utilise uniquement ses requêtes depuis le contrôleur principal : index.php
    die('Erreur : '.basename(__FILE__));
}
 require ('header.php');
?>
<div id="form">
        <form action="?action=connexion" method="post">

                    
            <p><label for="mail"> mail </label>
                <input type="text" name="mail" 
                    placeholder="Your mail" value=<?php echo $_POST["mail"] ?? ''?>></p>
                    
            <p><label for="password">Password </label>
                <input type="text" name="password" 
                    placeholder="Your password" value=<?php echo $_POST["mdp"] ?? ''?>></p>
                <input type="submit" value="Connexion">
            <a href="./?action=register">Inscription</a>
        </form>
    </div>

    <?php require ('footer.php'); ?>