<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <link rel="stylesheet" href="../style_navbar.css">
    <link rel="stylesheet" href="post/post.css">

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
    <p>
    <?php
    session_start();
    // echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    $prenom = $_SESSION["prenom"];
    $prenomCapitalized = ucfirst($prenom); // Met la première lettre en majuscule
    echo "Bonjour " . $prenomCapitalized . ", bienvenue!";
    ?>
    </p>
    <div>
        <?php
        // include "../accueil/barrederecherche/barrederecherche.php";
        include "../accueil/barrederecherche/redirectionrecherche.php";
        ?>
    </div>

    <div>
        <?php
            include "../accueil/post/post.php";
        ?>
    </div>

    <!-- <?php
    // session_start();// une fois par fichier 
    echo "<p class=\"test\">";
    echo "Bonjour ".$_SESSION["prenom"].", bienvenue!";
    echo "</p>";?> -->

    

    
=======
    <link rel="stylesheet" href="style_accueil.css">
    <title>Accueil</title>
</head>
<body>
    <div>
        <?php
        include "../navbar/navbar.php";
        ?> 
    </div>
     
    <div class="main">
        <div class="profil">
            Ici l'aperçu profil du user</br>
            <img src="../images/icon_person.png" alt="">
            <?php
               echo $_SESSION["prenom"].'</br>';
            ?>
        </div>

        <div class="main_posts"> 
            <div class="container_newpost">
                    <div class="newPost_headline">
                        Quelque chose à partager ?<br>
                        <form id = "newPost" action="">
                            <input type="text" name="newPost" placeholder="Ma participation ajd ...">
                            <input type="submit" value="Publier"></input>
                        </form>
                    </div>    
            </div>
            <div class="posts">
                <div class="post">
                    Ici un post
                </div> 
                <div class="post">
                    Ici un autre post
                </div>
            </div>
        </div>
        <div class="search_bar">
            <strong>Rechercher un ami :</strong>  
            <?php
            // include "../accueil/barrederecherche/barrederecherche.php";
            include "../accueil/barrederecherche/redirectionrecherche.php";
            ?>
        </div>
    </div>
>>>>>>> 19b869d0c7ce64b9c7c4495c7bb4d540e1583f6d
</body>
</html>

      

            