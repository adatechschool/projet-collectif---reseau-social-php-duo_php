<?php
    include "../../connectdatabase.php";
    session_start();
    
    $newMail=$_POST["newMail"];
    $newPrenom=$_POST["newPrenom"];
    $newNom = $_POST["newNom"];

    $id=$_SESSION['id'];

    $sql="UPDATE users SET mail ='$newMail', nom ='$newNom', prenom ='$newPrenom' WHERE id=$id";
    $result=$conn->query($sql);
    
    $_SESSION['mail']= $newMail;
    $_SESSION['nom']=$newNom;
    $_SESSION['prenom']=$newPrenom;
   
    header('Location: ./profil.php');
    exit();  
  
    
?>
