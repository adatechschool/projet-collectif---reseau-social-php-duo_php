<?php
    include "../connectdatabase.php";

    $nom=$_POST["nom"];
    $nb_min_joueurs=$_POST["nb_min_joueurs"];
    $nb_max_joueurs=$_POST["nb_max_joueurs"];
    $temps_de_jeux=$_POST["temps_de_jeux"];
    $content=$_POST["content"];
    $niveau=$_POST["selectNiveau"];

    // Je prépare la requête afin d'utiliser bindParam pour avoir accès à des caractères spéciaux
    $new_game = $conn->prepare("INSERT INTO jeux (nom, nb_min_joueurs, nb_max_joueurs, temps_de_jeux, content, niveau)
    VALUES (:nom, :nb_min_joueurs, :nb_max_joueurs, :temps_de_jeux, :content, :niveau)");

    // Liaison des paramètres pour pouvoir accueillir des champs avec des caractères spéciaux
    // comme le nom de jeu "Bataille navale", l'espace est un caractère spécial

    $new_game->bindParam(':nom', $nom);
    $new_game->bindParam(':nb_min_joueurs', $nb_min_joueurs);
    $new_game->bindParam(':nb_max_joueurs', $nb_max_joueurs);
    $new_game->bindParam(':temps_de_jeux', $temps_de_jeux);
    $new_game->bindParam(':content', $content);
    $new_game->bindParam(':niveau', $niveau);
    $new_game->execute();

    header('Location: ../jeux/jeux.php');
        exit();
?>