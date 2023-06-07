<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style> <?php include 'style_navbar.css'; ?> </style>
    <title>NavBar</title>
</head>
<body>
    <nav>
        <ul class="nav_accueil">
            <a href="/projet-collectif---reseau-social-php-duo_php/accueil/accueil.php"><img class="icone_jeux" src="/projet-collectif---reseau-social-php-duo_php/images/jeu-de-plateau.png" alt="Icône Jeux"></a>
            <li><a href="/projet-collectif---reseau-social-php-duo_php/accueil/accueil.php">Accueil</a></li>
            <li id ="bienvenue">
                <?php
                session_start();
                // echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
                $prenom = $_SESSION["prenom"];
                $prenomCapitalized = ucfirst($prenom); // Met la première lettre en majuscule
                echo "Bonjour " . $prenomCapitalized . ", bienvenue!";
                ?>
            </li>
        </ul>
        <ul class="nav_profil">
            <li><a href="/projet-collectif---reseau-social-php-duo_php/jeux/jeux.php">Jeux de Société</a></li>
            <li><a href ="/projet-collectif---reseau-social-php-duo_php/accueil/profil/profil.php">Mon profil</a></li>
             
        <a href="/projet-collectif---reseau-social-php-duo_php/deconnexion.php">
            <button id="deconnexion"> 
                <img src="/projet-collectif---reseau-social-php-duo_php/images/icon_off.png" alt="icone off">
                Deconnexion
            </button>
        </a>
        </ul>
    </nav>
   
</body>
</html>