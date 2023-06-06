<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" href="style_jeux.css" />
    <title>Jeux</title>
</head>

<!-- <form action="../deconnexion/logout.php" method="POST">
    <input type="submit" name="logout" value="Déconnexion">
</form> -->

<!-- Le formulaire pour entrer un nouveau jeu dans le catalogue -->

<body>
<div>
    <?php
    include "../navbar/navbar.php"
    ?> 
</div>
<h2 id="header_coll">Complète ta collection en ajoutant tes jeux ☀️</h2>
<div class="main_page">
    
    <div class="form-container">
        <h3 class="form-title">Tu ne trouves pas ton jeu ? Ajoute-le au répertoire !</h3>
        <form class="form" action="newgame.php" method="post">
            <p class="form-name">Nom du jeu : <br> <input type="text" name="nom" /></p>
            <p class="form-min-player">Combien de joueurs minimum : <input type="text" name="nb_min_joueurs" /></p>
            <p class="form-max-player">Combien de joueurs maximum : <input type="text" name="nb_max_joueurs" /></p>
            <p class="form-time">Quel est le temps de jeu estimé ? (en minutes) <input type="text" name="temps_de_jeux" /></p>
            <div class="container-select">
                <p class="form-niveau">Quel est la difficulté du jeu ?</p>
                    <select class="form-select" name="selectNiveau">
                        <option value="facile">Facile</option>
                        <option value="moyen">Moyen</option>
                        <option value="difficile">Difficile</option>
                    </select>
            </div>
            <p class="form-description">Ajoutez une description. (1000 caractères maximum) <textarea name="description" id="description" cols="30" rows="5"></textarea></p>
            <p class="form-submit "><input class="form-input-submit btn_add" type="submit" value="Ajouter ce jeu au répertoire"></p>
        </form>
    </div>

    <div class="game-container">
        <div class="search_bar_test_style">   
            <h3>Recherche ton jeu pour l’ajouter à ta collection : </h3>
            <input type="text" name="text_test_style" id="text_test_style">
            <input type="submit" class="btn_add" value="Rechercher">
            <h2>Répertoire de jeux :</h2>
        </div>   
        <?php
        include "../connectdatabase.php";
            
        $sql="SELECT * FROM `jeux` ORDER BY `jeux`.`nom` ASC";
        $result = $conn->query($sql);


        while ($game = $result->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        
        <div class="game-box">
            <div class ="img_jeu">
                <img class="game-img" src="../images/8b-ark-nova-cover.jpg">
                <div class="like_game">
                    <button class="btn_like"><img src="../images/heart.png" alt=""></button>
                </div>
            </div>
            <div class="details_jeu">
                <h3 class="game-name"><?php echo "Nom du jeu : ".$game['nom'] ?></h3>
                <p class="nb-min-player"><?php echo "Nombre minimum de joueurs : ".$game['nb_min_joueurs']?></p>
                <p class="nb-max-player"><?php echo "Nombre maximum de joueurs : ".$game['nb_max_joueurs']?></p>
                <p class="game-time"><?php echo "Temps de jeu estimé : ".$game['temps_de_jeux']?></p>
                <p class="game-niveau"><?php echo "Difficulté du jeu : ".$game['niveau']?></p>
                <div class="game-description"><?php echo "Description : <br>".$game['content']?></div>
                <form method="POST" action="addToCollection.php">
                    <input type="hidden" name="nom" value="<?php echo $game['nom']; ?>">
                    <input type="hidden" name="nb_min_joueurs" value="<?php echo $game['nb_min_joueurs']; ?>">
                    <input type="hidden" name="nb_max_joueurs" value="<?php echo $game['nb_max_joueurs']; ?>">
                    <input type="hidden" name="temps_de_jeux" value="<?php echo $game['temps_de_jeux']; ?>">
                    <input type="hidden" name="niveau" value="<?php echo $game['niveau']; ?>">
                    <input type="hidden" name="content"value="<?php echo $game['content']; ?>">
                    <button class="btn_add" type="submit">Ajouter à ma collection</button>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
</body>
</html>