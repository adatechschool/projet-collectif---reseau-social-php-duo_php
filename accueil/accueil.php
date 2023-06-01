<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <a href ="./profil.php">Profil</a>
    <a href="#">Accueil</a>
    <button>Deconnexion</button>

    <?php
    session_start();// une fois par fichier 

    echo "<p class=\"test\">";
    echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    echo "</p>";
    
    ?>

    <p>
    <?php
    // session_start();
    echo "Bonjour ".$_SESSION["nom"].", bienvenue!";
    ?>

    </p>
</body>
</html>