<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Inscription</title>
</head>
<body>
    <div class="inscription">
        <h2>Inscription</h2>
        <form action="enregistrement.php" method="post">
            
                    <label for="nom">Votre nom :</label> <input type="text" name="nom" id="nom" placeholder="Votre nom"/></br>
                   
                    <label for="prenom">Votre prenom : </label><input type="text" name="prenom" id="prenom" placeholder="Votre prenom"/></br>
                    
                    <label for="mail">Votre mail:</label></label> <input type="email" name="mail" id="mail" placeholder="Votre mail"/></br>
                   
                    <label for="mail2">Confirmez votre mail:</label></label> <input type="email" name="mail2" id="mail2" placeholder="Confirmez votre mail"/></br>
                    
                    <label for="mdp">Votre mot de passe: </label><input type="password" name="mdp" id="mdp" placeholder="Votre mot de passe"/></br></br>
                 
                    <p><input type="submit"  name ="form_inscription" value="OK"></p>
             
        </form>
        <?php
        if (isset($message))
        {
            echo '<font color ="red">'.$message."</font>";
        }
        ?>
    </div>
</body>
</html>

