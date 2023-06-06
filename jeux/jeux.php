<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../style_navbar.css">
    <title>Jeux</title>
</head>

<!-- <form action="../deconnexion/logout.php" method="POST">
    <input type="submit" name="logout" value="Déconnexion">
</form> -->

<!-- Le formulaire pour entrer un nouveau jeu dans le catalogue -->

<body>
<nav>
        <ul>
            <li><a href="#"><img class="icone_jeux" src="../images/jeu-de-plateau.png" alt="Icône Jeux"></a></li>
            <li><a href="../accueil/accueil.php">Accueil</a></li>
            <li><a href ="../accueil/profil/profil.php">Profil</a></li>
            <li><a href="#">Jeux de Société</a></li>
            <li><button class="deconnexion"><a href="../deconnexion.php" class="button">Deconnexion</a></button></li>
        </ul>
    </nav>
    <div class="form-container">
        <h2 class="form-title">Ajout d'un jeu dans la liste</h2>
            <form class="form" action="newgame.php" method="post">
                <p class="form-name">Nom du jeu : <input type="text" name="nom" /></p>
                <p class="form-min-player">Combien de joueurs minimum : <input type="text" name="nb_min_joueurs" /></p>
                <p class="form-max-player">Combien de joueurs maximum: <input type="text" name="nb_max_joueurs" /></p>
                <p class="form-time">Quel est le temps de jeu estimé ? (en minutes) <input type="text" name="temps_de_jeux" /></p>
                <div class="container-select">
                    <p class="form-niveau">Quel est la difficultée du jeu ?</p>
                        <select class="form-select" name="selectNiveau">
                            <option value="facile">Facile</option>
                            <option value="moyen">Moyen</option>
                            <option value="difficile">Difficile</option>
                        </select>
                </div>
                <p class="form-description">Ajoutez une description. (1000 caractères maximum) <input type="text" name="content" /></p>
                <p class="form-submit"><input class="form-input-submit" type="submit" value="Ajouter votre jeu"></p>
            </form>
    </div>

    <div class="game-container">
        <?php
        include "../connectdatabase.php";
            
        $sql="SELECT * FROM `jeux` ORDER BY `jeux`.`nom` ASC";
        $result = $conn->query($sql);


        while ($game = $result->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        <div class="game-box">
            <h3 class="game-name"><?php echo $game['nom'] ?></h3>
            <img class="game-img" src="../images/8b-ark-nova-cover.jpg">
            <p class="nb-min-player"><?php echo $game['nb_min_joueurs']?></p>
            <p class="nb-max-player"><?php echo $game['nb_max_joueurs']?></p>
            <p class="game-time"><?php echo $game['temps_de_jeux']?></p>
            <p class="game-niveau"><?php echo $game['niveau']?></p>
            <div class="game-description"><?php echo $game['content']?></div>
            <form method="POST" action="addToCollection.php">
                <input type="hidden" name="nom" value="<?php echo $game['nom']; ?>">
                <input type="hidden" name="nb_min_joueurs" value="<?php echo $game['nb_min_joueurs']; ?>">
                <input type="hidden" name="nb_max_joueurs" value="<?php echo $game['nb_max_joueurs']; ?>">
                <input type="hidden" name="temps_de_jeux" value="<?php echo $game['temps_de_jeux']; ?>">
                <input type="hidden" name="niveau" value="<?php echo $game['niveau']; ?>">
                <input type="hidden" name="content"value="<?php echo $game['content']; ?>">
                <button type="submit">Ajouter à la collection</button>
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</body>
</html>