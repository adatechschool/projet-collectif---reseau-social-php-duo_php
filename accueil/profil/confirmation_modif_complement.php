<?php
    include "../../connectdatabase.php";
    session_start();
    
    $newPseudo=$_POST["newPseudo"];
    $newBio=$_POST["newBio"];
    $niveau = $_POST["niveau"];
    $newVille=$_POST["newVille"];

    $id=$_SESSION['id'];


 
    $sql = "UPDATE `users`SET pseudo='$newPseudo',bio='$newBio',niveau='$niveau', ville='$newVille' WHERE id=$id";
    
    $result=$conn->query($sql);
    $_SESSION['pseudo']= $newPseudo;
    $_SESSION['bio']=$newBio;
    $_SESSION['niveau']=$niveau;
    $_SESSION['ville']=$newVille;

   

    header('Location: ./profil.php');
    exit();  

    ?>