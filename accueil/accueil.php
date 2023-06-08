<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <div>
            <?php
                include "../accueil/post/post.php";
            ?>
        </div>

       
        <div class="search_bar">
            <strong>Rechercher un ami :</strong>  
            <?php
            // include "../accueil/barrederecherche/barrederecherche.php";
            include "../accueil/barrederecherche/redirectionrecherche.php";
            ?>
        </div>
    </div>
</body>
</html>

      

            