<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style_navbar.css">
    <title>Accueil</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#"><img class="icone_jeux" src="../images/jeu-de-plateau.png" alt="Icône Jeux"></a></li>
            <li><a href="#">Accueil</a></li>
            <li><a href ="./profil/profil.php">Profil</a></li>
            <li><a href="../jeux/jeux.php">Jeux de Société</a></li>
            <li><button class="deconnexion"><a href="../deconnexion.php" class="button">Deconnexion</a></button></li>
        </ul>
    </nav>
    <!-- <div class="navbar">
        <a href ="../accueil/profil.php">Profil</a>
        <a href="#">Accueil</a>
        <a href="#">Jeux de Société</a>
        <button><a href="../deconnexion.php" class="button">Deconnexion</a></button>
    </div> -->
    
    <div>
        <?php
        // include "../accueil/barrederecherche/barrederecherche.php";
        include "../accueil/barrederecherche/redirectionrecherche.php";
        ?>
    </div>

    <!-- <?php
    // session_start();// une fois par fichier 

    echo "<p class=\"test\">";
    echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    echo "</p>";
    

    ?> -->

    <p>
    <?php
    session_start();
    // echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    $prenom = $_SESSION["prenom"];
    $prenomCapitalized = ucfirst($prenom); // Met la première lettre en majuscule
    echo "Bonjour " . $prenomCapitalized . ", bienvenue!";
    ?>
    </p>

</body>
</html>

      

            