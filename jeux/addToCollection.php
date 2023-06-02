<?php
include "../connectdatabase.php";
session_start();

// Vérifier si les données ont été soumises via la méthode POST
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST["nom"];
    $nb_min_joueurs = $_POST["nb_min_joueurs"];
    $nb_max_joueurs = $_POST["nb_max_joueurs"];
    $temps_de_jeux = $_POST["temps_de_jeux"];
    $niveau = $_POST["niveau"];
    $content = $_POST["content"];
    $user_id = $_SESSION["id"]; 

    // Insérer les valeurs dans la table "collection"
    $sql = "INSERT INTO `collection` (user_id, nom, nb_min_joueurs, nb_max_joueurs, temps_de_jeux, content, niveau) 
    VALUES (:user_id, :nom, :nb_min_joueurs, :nb_max_joueurs, :temps_de_jeux, :content, :niveau)";
    $addGame = $conn->prepare($sql);
    $addGame->bindParam(":user_id", $user_id);
    $addGame->bindParam(":nom", $nom);
    $addGame->bindParam(":nb_min_joueurs", $nb_min_joueurs);
    $addGame->bindParam(":nb_max_joueurs", $nb_max_joueurs);
    $addGame->bindParam(":temps_de_jeux", $temps_de_jeux);
    $addGame->bindParam(":content", $content);
    $addGame->bindParam(":niveau", $niveau);
    $addGame->execute();

    header('Location: ../jeux/jeux.php');

?>