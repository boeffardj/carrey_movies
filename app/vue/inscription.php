

<h3>Page d'inscription</h3>
    <div id="form">
        <form action="?action=inscription" method="post">

            <p><label for="login"> pseudo </label>
                <input type="text" name="login" 
                    placeholder="Your pseudo" value=<?php echo $_POST["login"] ?? ''?>></p>
                    
            <p><label for="mail"> mail </label>
                <input type="text" name="mail" 
                    placeholder="Your mail" value=<?php echo $_POST["mail"] ?? ''?>></p>
                    
            <p><label for="password">Password </label>
                <input type="text" name="password" 
                    placeholder="Your password" value=<?php echo $_POST["password"] ?? ''?>></p>
                    <p>
                <input type="text" name="nom" placeholder="Nom *" >
                <input type="text" name="prenom" placeholder="Prénom *" >
            </p>
                    
                    <p><select name="civilité" class="taille">
                    <option>Vous êtes un(e) *</option>
                    <option value="m" class="taille">M</option>
                    <option value="f" class="taille">F</option>
                    <option value="autre" class="taille">Autre</option>
                </select>
            </p>
            <p><label for="date">date de naissance </label>
                <input type="text" name="date" 
                    placeholder="date de naissance" value=<?php echo $_POST["date"] ?? ''?>></p>
           
                    <p>
                <input type="submit" value="S'inscrire" class="bouton">
            </p>
        </form>
    </div>
